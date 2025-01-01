@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.user-menu.edit',['name'=>$user->name??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.user-menu.edit',['name'=>$user->name??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('user.update',$user->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="name"
			:caption="__('caption.cms.fields.user.name')"
			:initValue="(old('name')??$user->name)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="image"
			:caption="__('caption.cms.fields.user.image')"
			:initValue="(old('image')??$user->image)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="cover"
			:caption="__('caption.cms.fields.user.cover')"
			:initValue="(old('cover')??$user->cover)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="email"
			:caption="__('caption.cms.fields.user.email')"
			:initValue="(old('email')??$user->email)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="contact_number"
			:caption="__('caption.cms.fields.user.contact_number')"
			:initValue="(old('contact_number')??$user->contact_number)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="birth_date"
			:caption="__('caption.cms.fields.user.birth_date')"
			:initValue="(old('birth_date')??$user->birth_date)??null"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="gender"
			:initValue="(old('gender')??$user->gender)??null"
			:caption="__('caption.cms.fields.user.gender')"
			:values="__('values.user.gender')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="marital_status"
			:initValue="(old('marital_status')??$user->marital_status)??null"
			:caption="__('caption.cms.fields.user.marital_status')"
			:values="__('values.user.marital_status')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="nationality"
			:initValue="(old('nationality')??$user->nationality)??null"
			:caption="__('caption.cms.fields.user.nationality')"
			:values="__('values.user.nationality')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="city"
			:initValue="(old('city')??$user->city)??null"
			:caption="__('caption.cms.fields.user.city')"
			:values="__('values.user.city')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="country"
			:initValue="(old('country')??$user->country)??null"
			:caption="__('caption.cms.fields.user.country')"
			:values="__('values.user.country')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="address_details"
			:caption="__('caption.cms.fields.user.address_details')"
			:initValue="(old('address_details')??$user->address_details)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="roleable_type"
			:caption="__('caption.cms.fields.user.roleable_type')"
			:initValue="(old('roleable_type')??$user->roleable_type)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
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
