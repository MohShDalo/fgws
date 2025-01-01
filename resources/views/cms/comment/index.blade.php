@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.comment-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.comment-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_comments"
	model="\\App\\Models\\Comment"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="comment.show"
	editRoute="comment.edit"
	deleteRoute="comment.destroy"
	:fieldsNames="['content','created_by_name' /**Relation*/, 'post_content' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.comment.content'),
			__('caption.cms.fields.comment.created_by_id') /**Relation*/,
			__('caption.cms.fields.comment.post_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('comment.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('comment.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
