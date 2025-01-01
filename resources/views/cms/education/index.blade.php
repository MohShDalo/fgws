@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.education-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.education-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_educations"
	model="\\App\\Models\\Education"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="education.show"
	editRoute="education.edit"
	deleteRoute="education.destroy"
	:fieldsNames="['title','score','show_score_text','start_date_formated','end_date_formated','organizer','category_text','special_rank','note','freelancer_id' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.education.title'),
			__('caption.cms.fields.education.score'),
			__('caption.cms.fields.education.show_score'),
			__('caption.cms.fields.education.start_date'),
			__('caption.cms.fields.education.end_date'),
			__('caption.cms.fields.education.organizer'),
			__('caption.cms.fields.education.category'),
			__('caption.cms.fields.education.special_rank'),
			__('caption.cms.fields.education.note'),
			__('caption.cms.fields.education.freelancer_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('education.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('education.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
