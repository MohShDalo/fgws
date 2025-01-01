<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\CertificateExcelHelper;
use App\Http\Requests\Store\StoreCertificateRequest;
use App\Http\Requests\Update\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Freelancer;
class CertificateController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Certificate')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Certificate')->only(['create','store']);
		$this->middleware('can:view,certificate')->only('show');
		$this->middleware('can:update,certificate')->only(['edit','update']);
		$this->middleware('can:delete,certificate')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.certificate.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.certificate.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreCertificateRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCertificateRequest $request)
	{
		$temp = $request->validated();
		$data = Certificate::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.certificate.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Certificate $certificate
	 * @return \Illuminate\Http\Response
	 */
	public function show(Certificate $certificate)
	{
		return view('cms.certificate.show',array('certificate'=>$certificate));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Certificate $certificate
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Certificate $certificate)
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.certificate.edit',array('freelancers'=>$freelancers,'certificate'=>$certificate));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateCertificateRequest $request
	 * @param  \App\Models\Certificate $certificate
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCertificateRequest $request, Certificate $certificate)
	{
		$data = $request->validated();
		$certificate->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.certificate.success.update',['name'=>$certificate->id??'']));
		return redirect(route('certificate.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Certificate $certificate
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Certificate $certificate)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$certificate->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.certificate.success.delete',['name'=>"$certificate->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.certificate.failed.delete',['name'=>$certificate->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Certificate::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new CertificateExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/certificate '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));	
		}catch(\Exception $e){
			\Log::error('Error of excel export - certificate',[$e->getMessage()])
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.certificate.report');
	}
}
