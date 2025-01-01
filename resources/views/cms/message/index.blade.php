@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.message-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.message-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_messages"
	model="\\App\\Models\\Message"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="message.show"
	editRoute="message.edit"
	deleteRoute="message.destroy"
	:fieldsNames="['content','created_by_name' /**Relation*/, 'chat_title' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.message.content'),
			__('caption.cms.fields.message.created_by_id') /**Relation*/,
			__('caption.cms.fields.message.chat_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('message.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('message.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
