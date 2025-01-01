@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.experience-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.experience-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('experience.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="postion"
			:caption="__('caption.cms.fields.experience.postion')"
			:initValue="old('postion')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_name"
			:caption="__('caption.cms.fields.experience.company_name')"
			:initValue="old('company_name')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_address"
			:caption="__('caption.cms.fields.experience.company_address')"
			:initValue="old('company_address')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="start_date"
			:caption="__('caption.cms.fields.experience.start_date')"
			:initValue="old('start_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="end_date"
			:caption="__('caption.cms.fields.experience.end_date')"
			:initValue="old('end_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="old('category')"
			:caption="__('caption.cms.fields.experience.category')"
			:values="__('values.experience.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="note"
			:caption="__('caption.cms.fields.experience.note')"
			:initValue="old('note')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="freelancer_id"
			:initValue="old('freelancer_id')??null"
			:caption="__('caption.cms.fields.experience.freelancer_id')"
			:values="$freelancers"
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
		<a href="{{route('experience.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.experience-menu.index')}}</a>
	</div>
</div>
@endsection
