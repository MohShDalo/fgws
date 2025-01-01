@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.reaction-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.reaction-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_reactions"
	model="\\App\\Models\\Reaction"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="reaction.show"
	editRoute="reaction.edit"
	deleteRoute="reaction.destroy"
	:fieldsNames="['type_text','created_by_name' /**Relation*/, 'post_content' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.reaction.type'),
			__('caption.cms.fields.reaction.created_by_id') /**Relation*/,
			__('caption.cms.fields.reaction.post_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('reaction.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('reaction.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
