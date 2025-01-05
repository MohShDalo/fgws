@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.job-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.job-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('job.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.job.content')"
			:initValue="old('content')"
			:rows="4"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="needed_postion"
			:caption="__('caption.cms.fields.job.needed_postion')"
			:initValue="old('needed_postion')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="max_price"
			:caption="__('caption.cms.fields.job.max_price')"
			:initValue="old('max_price')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="max_time"
			:caption="__('caption.cms.fields.job.max_time')"
			:initValue="old('max_time')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="expected_start_date"
			:caption="__('caption.cms.fields.job.expected_start_date')"
			:initValue="old('expected_start_date')"
			type="date"
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
		<a href="{{route('job.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.job-menu.index')}}</a>
	</div>
</div>
@endsection
