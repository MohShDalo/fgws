@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.manger-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.manger-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_mangers"
	model="\\App\\Models\\Manger"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="manger.show"
	editRoute="manger.edit"
	deleteRoute="manger.destroy"
	:fieldsNames="['company_name','company_objectives','company_employees',]"
	:colLabels="[
			__('caption.cms.fields.manger.company_name'),
			__('caption.cms.fields.manger.company_objectives'),
			__('caption.cms.fields.manger.company_employees'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('manger.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('manger.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
