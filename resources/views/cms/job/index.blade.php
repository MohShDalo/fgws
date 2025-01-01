@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.job-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.job-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_jobs"
	model="\\App\\Models\\Job"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="job.show"
	editRoute="job.edit"
	deleteRoute="job.destroy"
	:fieldsNames="['content','needed_postion','max_price','max_time','expected_start_date_formated','worker_id' /**Relation*/, 'owner_id' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.job.content'),
			__('caption.cms.fields.job.needed_postion'),
			__('caption.cms.fields.job.max_price'),
			__('caption.cms.fields.job.max_time'),
			__('caption.cms.fields.job.expected_start_date'),
			__('caption.cms.fields.job.worker_id') /**Relation*/,
			__('caption.cms.fields.job.owner_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('job.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('job.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
