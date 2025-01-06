@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.post-menu.edit',['name'=>$post->content??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.post-menu.edit',['name'=>$post->content??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('post.update',$post->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">

		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.post.content')"
			:initValue="(old('content')??$post->content)??null"
			:rows="4"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="image"
			:caption="__('caption.cms.fields.post.image')"
			:initValue="(old('image')??$post->image)??null"
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
