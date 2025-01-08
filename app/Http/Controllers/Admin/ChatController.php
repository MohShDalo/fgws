<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\ChatExcelHelper;
use App\Http\Requests\Store\StoreChatRequest;
use App\Http\Requests\Update\UpdateChatRequest;
use App\Models\Chat;
use App\Models\User;
class ChatController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Chat')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Chat')->only(['create','store']);
		$this->middleware('can:view,chat')->only('show');
		$this->middleware('can:update,chat')->only(['edit','update']);
		$this->middleware('can:delete,chat')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.chat.index',['chats'=>Chat::owned()->get()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$users = User::pluck('name','id')->toArray();
		$users = User::pluck('name','id')->toArray();
		$users = User::pluck('name','id')->toArray();
		return view('cms.chat.create',array('users'=>$users,'users'=>$users,'users'=>$users,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreChatRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreChatRequest $request)
	{
		$temp = $request->validated();
		$data = Chat::create($temp);
		// session()->put('type',"success");
		// session()->put('message',__('messages.chat.success.create',['name'=>$data->title??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Chat $chat
	 * @return \Illuminate\Http\Response
	 */
	public function show(Chat $chat)
	{
		return view('cms.chat.show',array('chat'=>$chat));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Chat $chat
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Chat $chat)
	{

		$users = User::pluck('name','id')->toArray();
		$users = User::pluck('name','id')->toArray();
		$users = User::pluck('name','id')->toArray();
		return view('cms.chat.edit',array('users'=>$users,'users'=>$users,'users'=>$users,'chat'=>$chat));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateChatRequest $request
	 * @param  \App\Models\Chat $chat
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateChatRequest $request, Chat $chat)
	{
		$data = $request->validated();
		$chat->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.chat.success.update',['name'=>$chat->title??'']));
		return redirect(route('chat.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Chat $chat
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Chat $chat)
	{
		if(true){		/*validate deletion, check relations "'users'=>$users,'users'=>$users,'users'=>$users,"*/
			$chat->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.chat.success.delete',['name'=>"$chat->title"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.chat.failed.delete',['name'=>$chat->title??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Chat::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new ChatExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/chat '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - chat',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.chat.report');
	}
}
