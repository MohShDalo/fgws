@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.certificate-menu.add' )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.certificate-menu.add' )}}</h1>
	</div>
</div>
<form action="{{route('certificate.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="course_title"
			:caption="__('caption.cms.fields.certificate.course_title')"
			:initValue="old('course_title')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="hours"
			:caption="__('caption.cms.fields.certificate.hours')"
			:initValue="old('hours')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="start_date"
			:caption="__('caption.cms.fields.certificate.start_date')"
			:initValue="old('start_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="end_date"
			:caption="__('caption.cms.fields.certificate.end_date')"
			:initValue="old('end_date')"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="organizer"
			:caption="__('caption.cms.fields.certificate.organizer')"
			:initValue="old('organizer')"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="old('category')"
			:caption="__('caption.cms.fields.certificate.category')"
			:values="__('values.certificate.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="file"
			:caption="__('caption.cms.fields.certificate.file')"
			:initValue="old('file')"
			type="file"
			:hint="null"
			placeholder=""
			extraAttribute=""
		></x-textfield>

		<x-switch-input
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="show"
			:caption="__('caption.cms.fields.certificate.show')"
			:initValue="old('show')"
			:value="true"
			:switchText="null"
			extraAttribute=""
			inputClass=""
		></x-switch-input>


		<x-textarea
            :xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
            idName="note"
            :caption="__('caption.cms.fields.certificate.note')"
            :initValue="old('note')"
            :rows="4"
            :cols="10"
            placeholder=""
            extraAttribute=""
        ></x-textarea>

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
		<a href="{{route('certificate.index')}}" class="btn btn-outline-primary btn-lg">{{__('caption.cms.menu-item.certificate-menu.index')}}</a>
	</div>
</div>
@endsection
