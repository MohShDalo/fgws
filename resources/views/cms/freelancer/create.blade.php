@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.freelancer-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.freelancer-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('freelancer.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="main_career"
			:caption="__('caption.cms.fields.freelancer.main_career')"
			:initValue="old('main_career')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="place_of_birth"
			:caption="__('caption.cms.fields.freelancer.place_of_birth')"
			:initValue="old('place_of_birth')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
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
		<a href="{{route('freelancer.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.freelancer-menu.index')}}</a>
	</div>
</div>
@endsection
