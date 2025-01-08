<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\LanguageExcelHelper;
use App\Http\Requests\Store\StoreLanguageRequest;
use App\Http\Requests\Update\UpdateLanguageRequest;
use App\Models\Language;
use App\Models\Freelancer;
class LanguageController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Language')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Language')->only(['create','store']);
		$this->middleware('can:view,language')->only('show');
		$this->middleware('can:update,language')->only(['edit','update']);
		$this->middleware('can:delete,language')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.language.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('cms.language.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreLanguageRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreLanguageRequest $request)
	{
		$temp = $request->validated();
		$data = Language::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.language.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Language $language
	 * @return \Illuminate\Http\Response
	 */
	public function show(Language $language)
	{
		return view('cms.language.show',array('language'=>$language));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Language $language
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Language $language)
	{
		return view('cms.language.edit',array('language'=>$language));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateLanguageRequest $request
	 * @param  \App\Models\Language $language
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateLanguageRequest $request, Language $language)
	{
		$data = $request->validated();
		$language->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.language.success.update',['name'=>$language->id??'']));
		return redirect(route('language.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Language $language
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Language $language)
	{
		if(true){		/*validate deletion, check relations ""*/
			$language->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.language.success.delete',['name'=>"$language->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.language.failed.delete',['name'=>$language->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Language::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new LanguageExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/language '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - language',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.language.report');
	}
}
