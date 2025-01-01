@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.offer-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.offer-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('offer.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.offer.content')"
			:initValue="old('content')"
			:rows="4"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="price"
			:caption="__('caption.cms.fields.offer.price')"
			:initValue="old('price')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="time"
			:caption="__('caption.cms.fields.offer.time')"
			:initValue="old('time')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="status"
			:initValue="old('status')"
			:caption="__('caption.cms.fields.offer.status')"
			:values="__('values.offer.status')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="status_reason"
			:caption="__('caption.cms.fields.offer.status_reason')"
			:initValue="old('status_reason')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="owner_id"
			:initValue="old('owner_id')??null"
			:caption="__('caption.cms.fields.offer.owner_id')"
			:values="$freelancers"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="job_id"
			:initValue="old('job_id')??null"
			:caption="__('caption.cms.fields.offer.job_id')"
			:values="$jobs"
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
		<a href="{{route('offer.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.offer-menu.index')}}</a>
	</div>
</div>
@endsection
