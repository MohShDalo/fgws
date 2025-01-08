<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FileStoreHelper;
use App\Helper\Excel\OfferExcelHelper;
use App\Http\Requests\Store\StoreOfferRequest;
use App\Http\Requests\Update\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\Freelancer;
use App\Models\Job;
use App\Models\Chat;
class OfferController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('can:viewAny,App\Models\Offer')->only(['index','exportExcel']);
		$this->middleware('can:create,App\Models\Offer')->only(['create','store']);
		$this->middleware('can:view,offer')->only('show');
		$this->middleware('can:update,offer')->only(['edit','update']);
		$this->middleware('can:delete,offer')->only('destroy');
		$this->middleware('can:approve,offer')->only('approve');
		// $this->middleware('can:action,patameter')->only('method');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.offer.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$jobs = Job::pluck('content','id')->toArray();
		return view('cms.offer.create',array('jobs'=>$jobs,));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Store\StoreOfferRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreOfferRequest $request)
	{
		$temp = $request->validated();
		$data = Offer::create($temp);
		session()->put('type',"success");
		session()->put('message',__('messages.offer.success.create',['name'=>$data->content??'']));
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Offer $offer
	 * @return \Illuminate\Http\Response
	 */
	public function show(Offer $offer)
	{
		return view('cms.offer.show',array('offer'=>$offer));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Offer $offer
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Offer $offer)
	{
		$jobs = Job::pluck('content','id')->toArray();
		return view('cms.offer.edit',array('jobs'=>$jobs,'offer'=>$offer));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Update\UpdateOfferRequest $request
	 * @param  \App\Models\Offer $offer
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateOfferRequest $request, Offer $offer)
	{
		$data = $request->validated();
		$offer->update($data);
		session()->put('type',"success");
		session()->put('message',__('messages.offer.success.update',['name'=>$offer->content??'']));
		return redirect(route('offer.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Offer $offer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Offer $offer)
	{
		if(true){		/*validate deletion, check relations "'jobs'=>$jobs,"*/
			$offer->delete();
			session()->put('type',"success");
			session()->put('message',__('messages.offer.success.delete',['name'=>"$offer->content"]));
		}else{
			return back()->withErrors(['delete'=>__('messages.offer.failed.delete',['name'=>$offer->content??''])]);
		}
		return back();
	}

	public function exportExcel(Request $request)
	{
		try{
			if(Offer::count()==0)
				return redirect(route('cms'))->withErrors(['download'=>__('messages.other.no-data')]);
		$filters = $request->has('filter')?collect($request->get('filter'))->first():[];
			$excel = new OfferExcelHelper('files/xlsx/'.now()->format('Y-m-d').'/offer '.now()->format('h-i').'.xlsx');
			return \Storage::download($excel->storeDataFromModel($filters));
		}catch(\Exception $e){
			\Log::error('Error of excel export - offer',[$e->getMessage()]);
			return redirect(route('cms'))->withErrors(['error'=>$e->getMessage()]);
		}
	}

	public function reportPage()
	{
		return ['message'=>'Not accepted'];//view('cms.offer.report');
	}
	public function approve(Offer $offer)
	{
        $isApproved = false;
        if($offer->isPending()){
            $offer->status = Offer::STATUS_APPROVED;
            $offer->save();
            $isApproved = true;
            session()->put('type',"success");
			session()->put('message',__('messages.offer.success.approve',['name'=>"$offer->owner_name"]));
        }else if($offer->isApproved()){
            session()->put('type',"success");
			session()->put('message',__('messages.offer.success.reject',['name'=>"$offer->owner_name"]));
            $offer->status = Offer::STATUS_REJECTED;
            $offer->save();
        }else if($offer->isRejected()){
            $isApproved = true;
            session()->put('type',"success");
			session()->put('message',__('messages.offer.success.approve',['name'=>"$offer->owner_name"]));
            $offer->status = Offer::STATUS_APPROVED;
            $offer->save();
        }
        if($isApproved &&
            !Chat::where('title',"Job ".$offer->job->needed_postion." Chat")->first()
        ){
            Chat::create([
                'title'             =>"Job ".$offer->job->needed_postion." Chat",
                'first_member_id'   =>\Auth::user()->id,
                'second_member_id'  =>$offer->owner->user->id,
                'created_by_id'     =>\Auth::user()->id,
            ]);
        }
        return redirect()->back();
	}
}
