@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.skill-menu.edit',['name'=>$skill->title??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.skill-menu.edit',['name'=>$skill->title??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('skill.update',$skill->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="title"
			:caption="__('caption.cms.fields.skill.title')"
			:initValue="(old('title')??$skill->title)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="category"
			:initValue="(old('category')??$skill->category)??null"
			:caption="__('caption.cms.fields.skill.category')"
			:values="__('values.skill.category')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-switch-input
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="show"
			:caption="__('caption.cms.fields.skill.show')"
			:initValue="(old('show')??$skill->show)??null"
			:value="true"
			:switchText="null"
			extraAttribute=""
			inputClass=""
		></x-switch-input>

		<x-dropdown-list
			idName="freelancer_id"
			:initValue="(old('freelancer_id')??$skill->freelancer_id)??null"
			:caption="__('caption.cms.fields.skill.freelancer_id')"
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
