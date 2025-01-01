@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.language-menu.edit',['name'=>$language->id??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.language-menu.edit',['name'=>$language->id??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('language.update',$language->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="language"
			:caption="__('caption.cms.fields.language.language')"
			:initValue="(old('language')??$language->language)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="(old('category')??$language->category)??null"
			:caption="__('caption.cms.fields.language.category')"
			:values="__('values.language.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="general_score"
			:caption="__('caption.cms.fields.language.general_score')"
			:initValue="(old('general_score')??$language->general_score)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="speaking_score"
			:caption="__('caption.cms.fields.language.speaking_score')"
			:initValue="(old('speaking_score')??$language->speaking_score)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="writing_score"
			:caption="__('caption.cms.fields.language.writing_score')"
			:initValue="(old('writing_score')??$language->writing_score)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="listening_score"
			:caption="__('caption.cms.fields.language.listening_score')"
			:initValue="(old('listening_score')??$language->listening_score)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-switch-input
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="show_details"
			:caption="__('caption.cms.fields.language.show_details')"
			:initValue="(old('show_details')??$language->show_details)??null"
			:value="true"
			:switchText="null"
			extraAttribute=""
			inputClass=""
		></x-switch-input>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="note"
			:caption="__('caption.cms.fields.language.note')"
			:initValue="(old('note')??$language->note)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="freelancer_id"
			:initValue="(old('freelancer_id')??$language->freelancer_id)??null"
			:caption="__('caption.cms.fields.language.freelancer_id')"
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
