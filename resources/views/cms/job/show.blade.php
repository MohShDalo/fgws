@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.job-menu.view',['name'=>$job->content??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.job-menu.view',["name"=>$job->content??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.content')}}</label>
						<div class="form-control">{!!$job->content??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.needed_postion')}}</label>
						<div class="form-control">{!!$job->needed_postion??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.max_price')}}</label>
						<div class="form-control">{!!$job->max_price??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.max_time')}}</label>
						<div class="form-control">{!!$job->max_time??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.expected_start_date')}}</label>
						<div class="form-control">{!!$job->expected_start_date_formated??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.worker_id')}}</label>
						<div class="form-control">{!!$job->worker_id??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.job.owner_id')}}</label>
						<div class="form-control">{!!$job->owner_id??'-'!!}</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<!-- Note -->
			</div>
		</div>
	</div>
	<div class="col-12 mt-3">
		<div class="row justify-content-center">
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<a href="{{route('job.edit',$job->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('job.destroy',$job->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$job->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($job->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.offer-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_offers"
	model="\\App\\Models\\Offer"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$job->offers()"
	:otherRoutes="[]"
	showRoute="offer.show"
	editRoute="offer.edit"
	deleteRoute="offer.destroy"
	:fieldsNames="['content','price','time','status_text','status_reason','owner_id','job_content',]"
	:colLabels="[
				__('caption.cms.fields.offer.content'),
				__('caption.cms.fields.offer.price'),
				__('caption.cms.fields.offer.time'),
				__('caption.cms.fields.offer.status'),
				__('caption.cms.fields.offer.status_reason'),
				__('caption.cms.fields.offer.owner_id'),
				__('caption.cms.fields.offer.job_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('job.show',$job->id)"
></x-table>
@endsection
