<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\PostExcelHelper;
use App\Http\Requests\Store\StorePostRequest;
use App\Http\Requests\Update\UpdatePostRequest;
use App\Models\Post;
use App\Models\Freelancer;
class PostController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Post')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Post')->only(['create','store']);
		$this->middleware('can:view,post')->only('show');
		$this->middleware('can:update,post')->only(['edit','update']);
		$this->middleware('can:delete,post')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.post.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('cms.post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StorePostRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePostRequest $request)
	{
		$temp = $request->validated();
		$data = Post::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.post.success.create',['name'=>$data->content??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		return view('cms.post.show',array('post'=>$post));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		return view('cms.post.edit',array('post'=>$post));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdatePostRequest $request
	 * @param  \App\Models\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdatePostRequest $request, Post $post)
	{
		$data = $request->validated();
		$post->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.post.success.update',['name'=>$post->content??'']));
		return redirect(route('post.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		if(true){		/*validate deletion, check relations ""*/
			$post->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.post.success.delete',['name'=>"$post->content"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.post.failed.delete',['name'=>$post->content??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Post::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new PostExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/post '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - post',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.post.report');
	}
}
