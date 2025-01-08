<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\MessageExcelHelper;
use App\Http\Requests\Store\StoreMessageRequest;
use App\Http\Requests\Update\UpdateMessageRequest;
use App\Models\Message;
use App\Models\User;
use App\Models\Chat;
class MessageController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Message')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Message')->only(['create','store']);
		$this->middleware('can:view,message')->only('show');
		$this->middleware('can:update,message')->only(['edit','update']);
		$this->middleware('can:delete,message')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.message.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		$users = User::pluck('name','id')->toArray();
		$chats = Chat::pluck('title','id')->toArray();
		return view('cms.message.create',array('users'=>$users,'chats'=>$chats,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreMessageRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreMessageRequest $request)
	{
		$temp = $request->validated();
		$data = Message::create($temp);
		// session()->put('type',"success");
		// session()->put('message',__('messages.message.success.create',['name'=>$data->content??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Message $message
	 * @return \Illuminate\Http\Response
	 */
	public function show(Message $message)
	{
		return view('cms.message.show',array('message'=>$message));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Message $message
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Message $message)
	{

		$users = User::pluck('name','id')->toArray();
		$chats = Chat::pluck('title','id')->toArray();
		return view('cms.message.edit',array('users'=>$users,'chats'=>$chats,'message'=>$message));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateMessageRequest $request
	 * @param  \App\Models\Message $message
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateMessageRequest $request, Message $message)
	{
		$data = $request->validated();
		$message->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.message.success.update',['name'=>$message->content??'']));
		return redirect(route('message.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Message $message
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Message $message)
	{
		if(true){		/*validate deletion, check relations "'users'=>$users,'chats'=>$chats,"*/
			$message->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.message.success.delete',['name'=>"$message->content"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.message.failed.delete',['name'=>$message->content??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Message::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new MessageExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/message '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - message',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.message.report');
	}
}
