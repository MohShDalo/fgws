@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.portfolio-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.portfolio-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('portfolio.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="title"
			:caption="__('caption.cms.fields.portfolio.title')"
			:initValue="old('title')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="release_date"
			:caption="__('caption.cms.fields.portfolio.release_date')"
			:initValue="old('release_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="link"
			:caption="__('caption.cms.fields.portfolio.link')"
			:initValue="old('link')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="old('category')"
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
			:initValue="old('mockup_image')"
			type="file"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="file"
			:caption="__('caption.cms.fields.portfolio.file')"
			:initValue="old('file')"
			type="file"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>


		<x-textarea
            :xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
            idName="note"
            :caption="__('caption.cms.fields.portfolio.note')"
            :initValue="old('note')"
            :rows="4"
            :cols="10"
            placeholder=""
            extraAttribute=""
        ></x-textarea>

	</div>
	<div class="row justify-content-center">
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
			<input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.save')}}">
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
			<input type="reset" class=" form-control btn btn-outline-danger"  value="{{__('caption.labels.reset')}}">
		</div>
	</div>
</form>
<div class="row">
	<div class="col-12">
		<a href="{{route('portfolio.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.portfolio-menu.index')}}</a>
	</div>
</div>
@endsection
