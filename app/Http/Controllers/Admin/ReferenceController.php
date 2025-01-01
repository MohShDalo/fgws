<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\ReferenceExcelHelper;
use App\Http\Requests\Store\StoreReferenceRequest;
use App\Http\Requests\Update\UpdateReferenceRequest;
use App\Models\Reference;
use App\Models\Freelancer;
class ReferenceController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Reference')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Reference')->only(['create','store']);
		$this->middleware('can:view,reference')->only('show');
		$this->middleware('can:update,reference')->only(['edit','update']);
		$this->middleware('can:delete,reference')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.reference.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.reference.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreReferenceRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreReferenceRequest $request)
	{
		$temp = $request->validated();
		$data = Reference::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.reference.success.create',['name'=>$data->full_name??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Reference $reference
	 * @return \Illuminate\Http\Response
	 */
	public function show(Reference $reference)
	{
		return view('cms.reference.show',array('reference'=>$reference));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Reference $reference
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Reference $reference)
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.reference.edit',array('freelancers'=>$freelancers,'reference'=>$reference));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateReferenceRequest $request
	 * @param  \App\Models\Reference $reference
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateReferenceRequest $request, Reference $reference)
	{
		$data = $request->validated();
		$reference->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.reference.success.update',['name'=>$reference->full_name??'']));
		return redirect(route('reference.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Reference $reference
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Reference $reference)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$reference->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.reference.success.delete',['name'=>"$reference->full_name"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.reference.failed.delete',['name'=>$reference->full_name??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Reference::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new ReferenceExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/reference '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));	
		}catch(\Exception $e){
			\Log::error('Error of excel export - reference',[$e->getMessage()])
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.reference.report');
	}
}
