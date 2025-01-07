<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\ReactionExcelHelper;
use App\Http\Requests\Store\StoreReactionRequest;
use App\Http\Requests\Update\UpdateReactionRequest;
use App\Models\Reaction;
use App\Models\User;
use App\Models\Post;
class ReactionController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Reaction')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Reaction')->only(['create','store']);
		$this->middleware('can:view,reaction')->only('show');
		$this->middleware('can:update,reaction')->only(['edit','update']);
		$this->middleware('can:delete,reaction')->only('destroy');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.reaction.index');
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
		return view('cms.reaction.create',array('users'=>$users,'posts'=>$posts,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreReactionRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreReactionRequest $request)
	{
		$temp = $request->validated();
        Reaction::where('created_by_id',$temp['created_by_id'])
        ->where('post_id',$temp['post_id'])
        ->where('type','<>',$temp['type'])
        ->delete();
        $tempReaction = Reaction::where('created_by_id',$temp['created_by_id'])
            ->where('post_id',$temp['post_id'])
            ->where('type',$temp['type'])->first();
        if($tempReaction){
            $tempReaction->delete();
        }else{
            $data = Reaction::create($temp);
        }
		// session()->put('type',"success");
		// session()->put('message',__('messages.reaction.success.create',['name'=>$data->id??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Reaction $reaction
	 * @return \Illuminate\Http\Response
	 */
	public function show(Reaction $reaction)
	{
		return view('cms.reaction.show',array('reaction'=>$reaction));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Reaction $reaction
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Reaction $reaction)
	{

		$users = User::pluck('name','id')->toArray();
		$posts = Post::pluck('content','id')->toArray();
		return view('cms.reaction.edit',array('users'=>$users,'posts'=>$posts,'reaction'=>$reaction));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateReactionRequest $request
	 * @param  \App\Models\Reaction $reaction
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateReactionRequest $request, Reaction $reaction)
	{
		$data = $request->validated();
		$reaction->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.reaction.success.update',['name'=>$reaction->id??'']));
		return redirect(route('reaction.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Reaction $reaction
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Reaction $reaction)
	{
		if(true){		/*validate deletion, check relations "'users'=>$users,'posts'=>$posts,"*/
			$reaction->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.reaction.success.delete',['name'=>"$reaction->id"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.reaction.failed.delete',['name'=>$reaction->id??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Reaction::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new ReactionExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/reaction '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - reaction',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.reaction.report');
	}
}
