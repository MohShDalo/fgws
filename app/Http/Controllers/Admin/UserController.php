<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\UserExcelHelper;
use App\Http\Requests\Store\StoreUserRequest;
use App\Http\Requests\Update\UpdateUserRequest;
use App\Models\User;
class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\User')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\User')->only(['create','store']);
		$this->middleware('can:view,user')->only('show');
		$this->middleware('can:update,user')->only(['edit','update']);
		$this->middleware('can:delete,user')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.user.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return view('cms.user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreUserRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUserRequest $request)
	{
		$temp = $request->validated();
		$data = User::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.user.success.create',['name'=>$data->name??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		return view('cms.user.show',array('user'=>$user));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{

		return view('cms.user.edit',array('user'=>$user));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateUserRequest $request
	 * @param  \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateUserRequest $request, User $user)
	{
		$data = $request->validated();
		$user->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.user.success.update',['name'=>$user->name??'']));
		return redirect(route('user.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		if(true){		/*validate deletion, check relations ""*/
			$user->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.user.success.delete',['name'=>"$user->name"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.user.failed.delete',['name'=>$user->name??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(User::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new UserExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/user '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - user',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.user.report');
	}
}
