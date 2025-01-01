<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\SkillExcelHelper;
use App\Http\Requests\Store\StoreSkillRequest;
use App\Http\Requests\Update\UpdateSkillRequest;
use App\Models\Skill;
use App\Models\Freelancer;
class SkillController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Skill')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Skill')->only(['create','store']);
		$this->middleware('can:view,skill')->only('show');
		$this->middleware('can:update,skill')->only(['edit','update']);
		$this->middleware('can:delete,skill')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.skill.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.skill.create',array('freelancers'=>$freelancers,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreSkillRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreSkillRequest $request)
	{
		$temp = $request->validated();
		$data = Skill::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.skill.success.create',['name'=>$data->title??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Skill $skill
	 * @return \Illuminate\Http\Response
	 */
	public function show(Skill $skill)
	{
		return view('cms.skill.show',array('skill'=>$skill));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Skill $skill
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Skill $skill)
	{
		
		$freelancers = Freelancer::pluck('id','id')->toArray();
		return view('cms.skill.edit',array('freelancers'=>$freelancers,'skill'=>$skill));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateSkillRequest $request
	 * @param  \App\Models\Skill $skill
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateSkillRequest $request, Skill $skill)
	{
		$data = $request->validated();
		$skill->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.skill.success.update',['name'=>$skill->title??'']));
		return redirect(route('skill.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Skill $skill
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Skill $skill)
	{
		if(true){		/*validate deletion, check relations "'freelancers'=>$freelancers,"*/
			$skill->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.skill.success.delete',['name'=>"$skill->title"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.skill.failed.delete',['name'=>$skill->title??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Skill::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new SkillExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/skill '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));	
		}catch(\Exception $e){
			\Log::error('Error of excel export - skill',[$e->getMessage()])
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.skill.report');
	}
}
