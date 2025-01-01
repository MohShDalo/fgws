<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\EducationExcelHelper;
use App\Http\Requests\Store\StoreEducationRequest;
use App\Http\Requests\Update\UpdateEducationRequest;
use App\Models\Education;
use App\Models\Freelancer;
class EducationController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Education')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Education')->only(['create','store']);
		$this->middleware('can:view,education')->only('show');
		$this->middleware('can:update,education')->only(['edit','update']);
		$this->middleware('can:delete,education')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.education.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.education.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreEducationRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEducationRequest $request)
	{
		$temp = $request->validated();
		$data = Education::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.education.success.create',['name'=>$data->title??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Education $education
	 * @return \Illuminate\Http\Response
	 */
	public function show(Education $education)
	{
		return view('cms.education.show',array('education'=>$education));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Education $education
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Education $education)
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.education.edit',array('freelancers'=>$freelancers,'education'=>$education));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateEducationRequest $request
	 * @param  \App\Models\Education $education
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateEducationRequest $request, Education $education)
	{
		$data = $request->validated();
		$education->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.education.success.update',['name'=>$education->title??'']));
		return redirect(route('education.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Education $education
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Education $education)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$education->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.education.success.delete',['name'=>"$education->title"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.education.failed.delete',['name'=>$education->title??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Education::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new EducationExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/education '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - education',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.education.report');
	}
}
