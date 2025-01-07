@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.offer-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.offer-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_offers"
	model="\\App\\Models\\Offer"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="\App\Models\Offer::owned()"
	:otherRoutes="[]"
	showRoute="offer.show"
	editRoute="offer.edit"
	deleteRoute="offer.destroy"
	:fieldsNames="['content','price','time','status_text','status_reason','owner_name' /**Relation*/, 'job_content' /**Relation*/, ]"
	:colLabels="[
			__('caption.cms.fields.offer.content'),
			__('caption.cms.fields.offer.price'),
			__('caption.cms.fields.offer.time'),
			__('caption.cms.fields.offer.status'),
			__('caption.cms.fields.offer.status_reason'),
			__('caption.cms.fields.offer.owner_id') /**Relation*/,
			__('caption.cms.fields.offer.job_id') /**Relation*/,
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('offer.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('offer.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
