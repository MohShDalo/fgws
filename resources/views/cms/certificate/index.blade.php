@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.certificate-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.certificate-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_certificates"
	model="\\App\\Models\\Certificate"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="\Auth::user()->roleable->certificates()"
	:otherRoutes="[]"
	showRoute="certificate.show"
	editRoute="certificate.edit"
	deleteRoute="certificate.destroy"
	:fieldsNames="['course_title','hours','start_date_formated','end_date_formated','organizer','category_text','file','show_text','note' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.certificate.course_title'),
			__('caption.cms.fields.certificate.hours'),
			__('caption.cms.fields.certificate.start_date'),
			__('caption.cms.fields.certificate.end_date'),
			__('caption.cms.fields.certificate.organizer'),
			__('caption.cms.fields.certificate.category'),
			__('caption.cms.fields.certificate.file'),
			__('caption.cms.fields.certificate.show'),
			__('caption.cms.fields.certificate.note'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('certificate.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('certificate.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
