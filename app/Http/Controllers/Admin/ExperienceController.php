<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\ExperienceExcelHelper;
use App\Http\Requests\Store\StoreExperienceRequest;
use App\Http\Requests\Update\UpdateExperienceRequest;
use App\Models\Experience;
use App\Models\Freelancer;
class ExperienceController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Experience')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Experience')->only(['create','store']);
		$this->middleware('can:view,experience')->only('show');
		$this->middleware('can:update,experience')->only(['edit','update']);
		$this->middleware('can:delete,experience')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.experience.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.experience.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreExperienceRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreExperienceRequest $request)
	{
		$temp = $request->validated();
		$data = Experience::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.experience.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Experience $experience
	 * @return \Illuminate\Http\Response
	 */
	public function show(Experience $experience)
	{
		return view('cms.experience.show',array('experience'=>$experience));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Experience $experience
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Experience $experience)
	{

		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.experience.edit',array('freelancers'=>$freelancers,'experience'=>$experience));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateExperienceRequest $request
	 * @param  \App\Models\Experience $experience
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateExperienceRequest $request, Experience $experience)
	{
		$data = $request->validated();
		$experience->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.experience.success.update',['name'=>$experience->id??'']));
		return redirect(route('experience.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Experience $experience
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Experience $experience)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$experience->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.experience.success.delete',['name'=>"$experience->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.experience.failed.delete',['name'=>$experience->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Experience::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new ExperienceExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/experience '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - experience',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.experience.report');
	}
}
