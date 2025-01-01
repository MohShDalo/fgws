@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.user-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.user-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_users"
	model="\\App\\Models\\User"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="[]"
	:otherRoutes="[]"
	showRoute="user.show"
	editRoute="user.edit"
	deleteRoute="user.destroy"
	:fieldsNames="['name','image','cover','email','contact_number','birth_date_formated','gender_text','marital_status_text','nationality_text','city_text','country_text','address_details','roleable_type',]"
	:colLabels="[
			__('caption.cms.fields.user.name'),
			__('caption.cms.fields.user.image'),
			__('caption.cms.fields.user.cover'),
			__('caption.cms.fields.user.email'),
			__('caption.cms.fields.user.contact_number'),
			__('caption.cms.fields.user.birth_date'),
			__('caption.cms.fields.user.gender'),
			__('caption.cms.fields.user.marital_status'),
			__('caption.cms.fields.user.nationality'),
			__('caption.cms.fields.user.city'),
			__('caption.cms.fields.user.country'),
			__('caption.cms.fields.user.address_details'),
			__('caption.cms.fields.user.roleable_type'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('user.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('user.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
