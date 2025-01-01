@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.certificate-menu.edit',['name'=>$certificate->id??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.certificate-menu.edit',['name'=>$certificate->id??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('certificate.update',$certificate->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="course_title"
			:caption="__('caption.cms.fields.certificate.course_title')"
			:initValue="(old('course_title')??$certificate->course_title)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="hours"
			:caption="__('caption.cms.fields.certificate.hours')"
			:initValue="(old('hours')??$certificate->hours)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="start_date"
			:caption="__('caption.cms.fields.certificate.start_date')"
			:initValue="(old('start_date')??$certificate->start_date)??null"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="end_date"
			:caption="__('caption.cms.fields.certificate.end_date')"
			:initValue="(old('end_date')??$certificate->end_date)??null"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="organizer"
			:caption="__('caption.cms.fields.certificate.organizer')"
			:initValue="(old('organizer')??$certificate->organizer)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="(old('category')??$certificate->category)??null"
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
			:initValue="(old('file')??$certificate->file)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-switch-input
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="show"
			:caption="__('caption.cms.fields.certificate.show')"
			:initValue="(old('show')??$certificate->show)??null"
			:value="true"
			:switchText="null"
			extraAttribute=""
			inputClass=""
		></x-switch-input>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="note"
			:caption="__('caption.cms.fields.certificate.note')"
			:initValue="(old('note')??$certificate->note)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="freelancer_id"
			:initValue="(old('freelancer_id')??$certificate->freelancer_id)??null"
			:caption="__('caption.cms.fields.certificate.freelancer_id')"
			:values="$freelancers"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

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
