<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\CommentExcelHelper;
use App\Http\Requests\Store\StoreCommentRequest;
use App\Http\Requests\Update\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
class CommentController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Comment')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Comment')->only(['create','store']);
		$this->middleware('can:view,comment')->only('show');
		$this->middleware('can:update,comment')->only(['edit','update']);
		$this->middleware('can:delete,comment')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.comment.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$users = User::pluck('name','id')->toArray();
		$posts = Post::pluck('content','id')->toArray();
		return view('cms.comment.create',array('users'=>$users,'posts'=>$posts,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreCommentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCommentRequest $request)
	{
		$temp = $request->validated();
		$data = Comment::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.comment.success.create',['name'=>$data->content??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Comment $comment
	 * @return \Illuminate\Http\Response
	 */
	public function show(Comment $comment)
	{
		return view('cms.comment.show',array('comment'=>$comment));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Comment $comment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Comment $comment)
	{
		
		$users = User::pluck('name','id')->toArray();
		$posts = Post::pluck('content','id')->toArray();
		return view('cms.comment.edit',array('users'=>$users,'posts'=>$posts,'comment'=>$comment));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateCommentRequest $request
	 * @param  \App\Models\Comment $comment
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCommentRequest $request, Comment $comment)
	{
		$data = $request->validated();
		$comment->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.comment.success.update',['name'=>$comment->content??'']));
		return redirect(route('comment.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Comment $comment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Comment $comment)
	{
		if(true){		/*validate deletion, check relations "'users'=>$users,'posts'=>$posts,"*/
			$comment->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.comment.success.delete',['name'=>"$comment->content"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.comment.failed.delete',['name'=>$comment->content??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Comment::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new CommentExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/comment '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));	
		}catch(\Exception $e){
			\Log::error('Error of excel export - comment',[$e->getMessage()])
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.comment.report');
	}
}
