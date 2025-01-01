@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.freelancer-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.freelancer-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_freelancers"
	model="\\App\\Models\\Freelancer"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="freelancer.show"
	editRoute="freelancer.edit"
	deleteRoute="freelancer.destroy"
	:fieldsNames="['main_career','place_of_birth','user_name' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.freelancer.main_career'),
			__('caption.cms.fields.freelancer.place_of_birth'),
			__('caption.cms.fields.freelancer.user_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('freelancer.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
