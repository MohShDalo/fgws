<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\JobExcelHelper;
use App\Http\Requests\Store\StoreJobRequest;
use App\Http\Requests\Update\UpdateJobRequest;
use App\Models\Job;
use App\Models\Freelancer;
use App\Models\Manger;
class JobController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Job')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Job')->only(['create','store']);
		$this->middleware('can:view,job')->only('show');
		$this->middleware('can:update,job')->only(['edit','update']);
		$this->middleware('can:delete,job')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.job.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		$mangers = Manger::pluck('id','id')->toArray();
		return view('cms.job.create',array('freelancers'=>$freelancers,'mangers'=>$mangers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreJobRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreJobRequest $request)
	{
		$temp = $request->validated();
		$data = Job::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.job.success.create',['name'=>$data->content??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Job $job
	 * @return \Illuminate\Http\Response
	 */
	public function show(Job $job)
	{
		return view('cms.job.show',array('job'=>$job));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Job $job
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Job $job)
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		$mangers = Manger::pluck('id','id')->toArray();
		return view('cms.job.edit',array('freelancers'=>$freelancers,'mangers'=>$mangers,'job'=>$job));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateJobRequest $request
	 * @param  \App\Models\Job $job
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateJobRequest $request, Job $job)
	{
		$data = $request->validated();
		$job->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.job.success.update',['name'=>$job->content??'']));
		return redirect(route('job.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Job $job
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Job $job)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,'mangers'=>$mangers,"*/
			$job->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.job.success.delete',['name'=>"$job->content"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.job.failed.delete',['name'=>$job->content??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Job::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new JobExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/job '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));	
		}catch(\Exception $e){
			\Log::error('Error of excel export - job',[$e->getMessage()])
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.job.report');
	}
}
