@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.message-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.message-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('message.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.message.content')"
			:initValue="old('content')"
			:rows="4"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-dropdown-list
			idName="created_by_id"
			:initValue="old('created_by_id')??null"
			:caption="__('caption.cms.fields.message.created_by_id')"
			:values="$users"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="chat_id"
			:initValue="old('chat_id')??null"
			:caption="__('caption.cms.fields.message.chat_id')"
			:values="$chats"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		 
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
		<a href="{{route('message.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.message-menu.index')}}</a>
	</div>
</div>
@endsection
