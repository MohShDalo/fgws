@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.skill-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.skill-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_skills"
	model="\\App\\Models\\Skill"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="\Auth::user()->roleable->skills()"
	:otherRoutes="[]"
	showRoute="skill.show"
	editRoute="skill.edit"
	deleteRoute="skill.destroy"
	:fieldsNames="['title','category_text','show_text',  ]"
	:colLabels="[
			__('caption.cms.fields.skill.title'),
			__('caption.cms.fields.skill.category'),
			__('caption.cms.fields.skill.show'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('skill.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('skill.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
