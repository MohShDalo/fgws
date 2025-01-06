<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\FreelancerExcelHelper;
use App\Http\Requests\Store\StoreFreelancerRequest;
use App\Http\Requests\Update\UpdateFreelancerRequest;
use App\Models\Freelancer;
use App\Models\User;
class FreelancerController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Freelancer')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Freelancer')->only(['create','store']);
		$this->middleware('can:view,freelancer')->only('show');
		$this->middleware('can:update,freelancer')->only(['edit','update']);
		$this->middleware('can:delete,freelancer')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.freelancer.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$users = User::pluck('name','id')->toArray();
		return view('cms.freelancer.create',array('users'=>$users,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreFreelancerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreFreelancerRequest $request)
	{
		$temp = $request->validated();
		$data = Freelancer::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.freelancer.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Freelancer $freelancer
	 * @return \Illuminate\Http\Response
	 */
	public function show(Freelancer $freelancer)
	{
		return view('cms.freelancer.show',array('freelancer'=>$freelancer));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Freelancer $freelancer
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Freelancer $freelancer)
	{

		$users = User::pluck('name','id')->toArray();
		return view('cms.freelancer.edit',array('users'=>$users,'freelancer'=>$freelancer));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateFreelancerRequest $request
	 * @param  \App\Models\Freelancer $freelancer
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateFreelancerRequest $request, Freelancer $freelancer)
	{
		$data = $request->validated();
		$freelancer->update($data);
		$freelancer->user->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.freelancer.success.update',['name'=>$freelancer->id??'']));
		return redirect(route('freelancer.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Freelancer $freelancer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Freelancer $freelancer)
	{
		if(true){		/*validate deletion, check relations "'users'=>$users,"*/
			$freelancer->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.freelancer.success.delete',['name'=>"$freelancer->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.freelancer.failed.delete',['name'=>$freelancer->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Freelancer::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new FreelancerExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/freelancer '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - freelancer',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.freelancer.report');
	}
}
