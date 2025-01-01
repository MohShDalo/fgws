@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.reference-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.reference-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_references"
	model="\\App\\Models\\Reference"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="reference.show"
	editRoute="reference.edit"
	deleteRoute="reference.destroy"
	:fieldsNames="['full_name','contact_number','email','postion','note','freelancer_id' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.reference.full_name'),
			__('caption.cms.fields.reference.contact_number'),
			__('caption.cms.fields.reference.email'),
			__('caption.cms.fields.reference.postion'),
			__('caption.cms.fields.reference.note'),
			__('caption.cms.fields.reference.freelancer_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('reference.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('reference.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
