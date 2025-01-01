@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.manger-menu.view',['name'=>$manger->id??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.manger-menu.view',["name"=>$manger->id??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.manger.company_name')}}</label>
						<div class="form-control">{!!$manger->company_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.manger.company_objectives')}}</label>
						<div class="form-control">{!!$manger->company_objectives??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.manger.company_employees')}}</label>
						<div class="form-control">{!!$manger->company_employees??'-'!!}</div>
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
				<a href="{{route('manger.edit',$manger->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('manger.destroy',$manger->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$manger->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($manger->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.job-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_jobs"
	model="\\App\\Models\\Job"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$manger->jobs()"
	:otherRoutes="[]"
	showRoute="job.show"
	editRoute="job.edit"
	deleteRoute="job.destroy"
	:fieldsNames="['content','needed_postion','max_price','max_time','expected_start_date_formated','worker_id','owner_id',]"
	:colLabels="[
				__('caption.cms.fields.job.content'),
				__('caption.cms.fields.job.needed_postion'),
				__('caption.cms.fields.job.max_price'),
				__('caption.cms.fields.job.max_time'),
				__('caption.cms.fields.job.expected_start_date'),
				__('caption.cms.fields.job.worker_id'),
				__('caption.cms.fields.job.owner_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('manger.show',$manger->id)"
></x-table>
@endsection
