@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.education-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.education-menu.add' )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('education.store')}}" method="POST">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="title"
			:caption="__('caption.cms.fields.education.title')"
			:initValue="old('title')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="score"
			:caption="__('caption.cms.fields.education.score')"
			:initValue="old('score')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-switch-input
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="show_score"
			:caption="__('caption.cms.fields.education.show_score')"
			:initValue="old('show_score')"
			:value="true"
			:switchText="null"
			extraAttribute=""
			inputClass=""
		></x-switch-input>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="start_date"
			:caption="__('caption.cms.fields.education.start_date')"
			:initValue="old('start_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="end_date"
			:caption="__('caption.cms.fields.education.end_date')"
			:initValue="old('end_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="organizer"
			:caption="__('caption.cms.fields.education.organizer')"
			:initValue="old('organizer')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="old('category')"
			:caption="__('caption.cms.fields.education.category')"
			:values="__('values.education.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="special_rank"
			:caption="__('caption.cms.fields.education.special_rank')"
			:initValue="old('special_rank')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="note"
			:caption="__('caption.cms.fields.education.note')"
			:initValue="old('note')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="freelancer_id"
			:initValue="old('freelancer_id')??null"
			:caption="__('caption.cms.fields.education.freelancer_id')"
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
		<a href="{{route('education.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.education-menu.index')}}</a>
	</div>
</div>
@endsection
