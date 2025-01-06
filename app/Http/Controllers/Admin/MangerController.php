<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\MangerExcelHelper;
use App\Http\Requests\Store\StoreMangerRequest;
use App\Http\Requests\Update\UpdateMangerRequest;
use App\Models\Manger;
class MangerController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Manger')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Manger')->only(['create','store']);
		$this->middleware('can:view,manger')->only('show');
		$this->middleware('can:update,manger')->only(['edit','update']);
		$this->middleware('can:delete,manger')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.manger.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return view('cms.manger.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreMangerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreMangerRequest $request)
	{
		$temp = $request->validated();
		$data = Manger::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.manger.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Manger $manger
	 * @return \Illuminate\Http\Response
	 */
	public function show(Manger $manger)
	{
		return view('cms.manger.show',array('manger'=>$manger));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Manger $manger
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Manger $manger)
	{

		return view('cms.manger.edit',array('manger'=>$manger));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateMangerRequest $request
	 * @param  \App\Models\Manger $manger
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateMangerRequest $request, Manger $manger)
	{
		$data = $request->validated();
		$manger->update($data);
		$manger->user->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.manger.success.update',['name'=>$manger->id??'']));
		return redirect(route('manger.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Manger $manger
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Manger $manger)
	{
		if(true){		/*validate deletion, check relations ""*/
			$manger->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.manger.success.delete',['name'=>"$manger->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.manger.failed.delete',['name'=>$manger->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Manger::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new MangerExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/manger '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - manger',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.manger.report');
	}
}
