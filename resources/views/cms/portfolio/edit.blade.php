@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.portfolio-menu.edit',['name'=>$portfolio->title??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.portfolio-menu.edit',['name'=>$portfolio->title??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('portfolio.update',$portfolio->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="title"
			:caption="__('caption.cms.fields.portfolio.title')"
			:initValue="(old('title')??$portfolio->title)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="release_date"
			:caption="__('caption.cms.fields.portfolio.release_date')"
			:initValue="(old('release_date')??$portfolio->release_date)??null"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="link"
			:caption="__('caption.cms.fields.portfolio.link')"
			:initValue="(old('link')??$portfolio->link)??null"
			type="text"
			:hint="$this->link_html_link"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="(old('category')??$portfolio->category)??null"
			:caption="__('caption.cms.fields.portfolio.category')"
			:values="__('values.portfolio.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="mockup_image"
			:caption="__('caption.cms.fields.portfolio.mockup_image')"
			:initValue="(old('mockup_image')??$portfolio->mockup_image)??null"
			type="file"
			:hint="$this->mockup_image_html_link"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="file"
			:caption="__('caption.cms.fields.portfolio.file')"
			:initValue="(old('file')??$portfolio->file)??null"
			type="file"
			:hint="$this->file_html_link"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="note"
			:caption="__('caption.cms.fields.portfolio.note')"
			:initValue="(old('note')??$portfolio->note)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

	</div>
	<div class="row justify-content-center">
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
			<input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.update')}}">
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
			<input type="reset" class=" form-control btn btn-outline-danger"  value="{{__('caption.labels.reset')}}">
		</div>
	</div>
</form>
@endsection
