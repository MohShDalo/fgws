@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.post-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.post-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('post.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.post.content')"
			:initValue="old('content')"
			:rows="10"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="image"
			:caption="__('caption.cms.fields.post.image')"
			:initValue="old('image')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

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
		<a href="{{route('post.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.post-menu.index')}}</a>
	</div>
</div>
@endsection
