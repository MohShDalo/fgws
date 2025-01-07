@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.portfolio-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.portfolio-menu.index' )}}</h1>
	</div>
</div>
<x-table
	parentClass="mb-3"
	idName="view_all_portfolios"
	model="\\App\\Models\\Portfolio"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="\Auth::user()->roleable->portfolios()"
	:otherRoutes="[]"
	showRoute="portfolio.show"
	editRoute="portfolio.edit"
	deleteRoute="portfolio.destroy"
	:fieldsNames="['title','release_date_formated','link_html_link','category_text','mockup_image_html_link','file_html_link','note', ]"
	:colLabels="[
			__('caption.cms.fields.portfolio.title'),
			__('caption.cms.fields.portfolio.release_date'),
			__('caption.cms.fields.portfolio.link'),
			__('caption.cms.fields.portfolio.category'),
			__('caption.cms.fields.portfolio.mockup_image'),
			__('caption.cms.fields.portfolio.file'),
			__('caption.cms.fields.portfolio.note'),
			]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('portfolio.index')"
> </x-table>
<div class="row justify-content-center mt-3 mb-3">
	<div class="col-lg-3">
		<a href="{{route('portfolio.export.excel')}}" target="_blank" class="form-control btn btn-outline-info">{{__('caption.labels.export-excel')}}</a>
	</div>
</div>
@endsection
