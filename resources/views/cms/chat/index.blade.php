@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.chat-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.chat-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_chats"
	model="\\App\\Models\\Chat"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="chat.show"
	editRoute="chat.edit"
	deleteRoute="chat.destroy"
	:fieldsNames="['title','first_member_name' /**Relation*/, 'second_member_name' /**Relation*/, 'created_by_name' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.chat.title'),
			__('caption.cms.fields.chat.first_member_id') /**Relation*/,
			__('caption.cms.fields.chat.second_member_id') /**Relation*/,
			__('caption.cms.fields.chat.created_by_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('chat.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('chat.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
