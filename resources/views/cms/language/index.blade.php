@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.language-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.language-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_languages"
	model="\\App\\Models\\Language"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="language.show"
	editRoute="language.edit"
	deleteRoute="language.destroy"
	:fieldsNames="['language','category_text','general_score','speaking_score','writing_score','listening_score','show_details_text','note','freelancer_id' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.language.language'),
			__('caption.cms.fields.language.category'),
			__('caption.cms.fields.language.general_score'),
			__('caption.cms.fields.language.speaking_score'),
			__('caption.cms.fields.language.writing_score'),
			__('caption.cms.fields.language.listening_score'),
			__('caption.cms.fields.language.show_details'),
			__('caption.cms.fields.language.note'),
			__('caption.cms.fields.language.freelancer_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('language.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('language.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
