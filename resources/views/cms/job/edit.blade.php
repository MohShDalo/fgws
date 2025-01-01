@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.job-menu.edit',['name'=>$job->content??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.job-menu.edit',['name'=>$job->content??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('job.update',$job->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-textarea
			:xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
			idName="content"
			:caption="__('caption.cms.fields.job.content')"
			:initValue="(old('content')??$job->content)??null"
			:rows="4"
			:cols="10"
			placeholder=""
			extraAttribute="required"
		></x-textarea>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="needed_postion"
			:caption="__('caption.cms.fields.job.needed_postion')"
			:initValue="(old('needed_postion')??$job->needed_postion)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="max_price"
			:caption="__('caption.cms.fields.job.max_price')"
			:initValue="(old('max_price')??$job->max_price)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="max_time"
			:caption="__('caption.cms.fields.job.max_time')"
			:initValue="(old('max_time')??$job->max_time)??null"
			type="text"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-textfield
			:xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
			idName="expected_start_date"
			:caption="__('caption.cms.fields.job.expected_start_date')"
			:initValue="(old('expected_start_date')??$job->expected_start_date)??null"
			type="date"
			:hint="null"
			placeholder=""
			extraAttribute="required"
		></x-textfield>

		<x-dropdown-list
			idName="worker_id"
			:initValue="(old('worker_id')??$job->worker_id)??null"
			:caption="__('caption.cms.fields.job.worker_id')"
			:values="$freelancers"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="owner_id"
			:initValue="(old('owner_id')??$job->owner_id)??null"
			:caption="__('caption.cms.fields.job.owner_id')"
			:values="$mangers"
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
