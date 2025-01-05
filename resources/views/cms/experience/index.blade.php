@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.experience-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.experience-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_experiences"
	model="\\App\\Models\\Experience"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="\Auth::user()->roleable->experiences()"
	:otherRoutes="[]"
	showRoute="experience.show"
	editRoute="experience.edit"
	deleteRoute="experience.destroy"
	:fieldsNames="['postion','company_name','company_address','start_date_formated','end_date_formated','category_text','note', ]"
	:colLabels="[
			__('caption.cms.fields.experience.postion'),
			__('caption.cms.fields.experience.company_name'),
			__('caption.cms.fields.experience.company_address'),
			__('caption.cms.fields.experience.start_date'),
			__('caption.cms.fields.experience.end_date'),
			__('caption.cms.fields.experience.category'),
			__('caption.cms.fields.experience.note'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('experience.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('experience.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
