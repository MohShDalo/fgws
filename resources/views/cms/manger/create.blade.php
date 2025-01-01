@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.manger-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.manger-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('manger.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_name"
			:caption="__('caption.cms.fields.manger.company_name')"
			:initValue="old('company_name')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_objectives"
			:caption="__('caption.cms.fields.manger.company_objectives')"
			:initValue="old('company_objectives')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_employees"
			:caption="__('caption.cms.fields.manger.company_employees')"
			:initValue="old('company_employees')"
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
		<a href="{{route('manger.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.manger-menu.index')}}</a>
	</div>
</div>
@endsection
