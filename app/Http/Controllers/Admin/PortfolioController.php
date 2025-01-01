<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\PortfolioExcelHelper;
use App\Http\Requests\Store\StorePortfolioRequest;
use App\Http\Requests\Update\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Models\Freelancer;
class PortfolioController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Portfolio')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Portfolio')->only(['create','store']);
		$this->middleware('can:view,portfolio')->only('show');
		$this->middleware('can:update,portfolio')->only(['edit','update']);
		$this->middleware('can:delete,portfolio')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.portfolio.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.portfolio.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StorePortfolioRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePortfolioRequest $request)
	{
		$temp = $request->validated();
		$data = Portfolio::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.portfolio.success.create',['name'=>$data->title??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Portfolio $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function show(Portfolio $portfolio)
	{
		return view('cms.portfolio.show',array('portfolio'=>$portfolio));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Portfolio $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Portfolio $portfolio)
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.portfolio.edit',array('freelancers'=>$freelancers,'portfolio'=>$portfolio));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdatePortfolioRequest $request
	 * @param  \App\Models\Portfolio $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
	{
		$data = $request->validated();
		$portfolio->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.portfolio.success.update',['name'=>$portfolio->title??'']));
		return redirect(route('portfolio.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Portfolio $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Portfolio $portfolio)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$portfolio->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.portfolio.success.delete',['name'=>"$portfolio->title"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.portfolio.failed.delete',['name'=>$portfolio->title??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Portfolio::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new PortfolioExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/portfolio '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - portfolio',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.portfolio.report');
	}
}
