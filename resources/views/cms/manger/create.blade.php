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
			idName="name"
			:caption="__('caption.cms.fields.user.name')"
			:initValue="old('name')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="image"
			:caption="__('caption.cms.fields.user.image')"
			:initValue="old('image')"
			type="file"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="cover"
			:caption="__('caption.cms.fields.user.cover')"
			:initValue="old('cover')"
			type="file"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="email"
			:caption="__('caption.cms.fields.user.email')"
			:initValue="old('email')"
			type="email"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="contact_number"
			:caption="__('caption.cms.fields.user.contact_number')"
			:initValue="old('contact_number')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="birth_date"
			:caption="__('caption.cms.fields.user.birth_date')"
			:initValue="old('birth_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="gender"
			:initValue="old('gender')"
			:caption="__('caption.cms.fields.user.gender')"
			:values="__('values.user.gender')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="marital_status"
			:initValue="old('marital_status')"
			:caption="__('caption.cms.fields.user.marital_status')"
			:values="__('values.user.marital_status')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

        <x-dropdown-list
			idName="nationality"
			:initValue="old('nationality')"
			:caption="__('caption.cms.fields.user.nationality')"
			:values="__('values.user.nationality')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="city"
			:initValue="old('city')"
			:caption="__('caption.cms.fields.user.city')"
			:values="__('values.user.city')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute=""
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="country"
			:initValue="old('country')"
			:caption="__('caption.cms.fields.user.country')"
			:values="__('values.user.country')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute=""
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="address_details"
			:caption="__('caption.cms.fields.user.address_details')"
			:initValue="old('address_details')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

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
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="company_employees"
			:caption="__('caption.cms.fields.manger.company_employees')"
			:initValue="old('company_employees')"
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
		<a href="{{route('manger.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.manger-menu.index')}}</a>
	</div>
</div>
@endsection
