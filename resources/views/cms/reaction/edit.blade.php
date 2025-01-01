@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.reaction-menu.edit',['name'=>$reaction->id??''] )}}
@endsection
<?php $is_RTL = \Config::get('app.locale') == 'ar';  ?>
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.reaction-menu.edit',['name'=>$reaction->id??''] )}}</h1>
	</div>
</div>
{{-- enctype="multipart/form-data" --}}
<form action="{{route('reaction.update',$reaction->id)}}" method="POST">
	@csrf
	@method("PUT")
	<div class="row">  
		
		<x-dropdown-list
			idName="type"
			:initValue="(old('type')??$reaction->type)??null"
			:caption="__('caption.cms.fields.reaction.type')"
			:values="__('values.reaction.type')"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="created_by_id"
			:initValue="(old('created_by_id')??$reaction->created_by_id)??null"
			:caption="__('caption.cms.fields.reaction.created_by_id')"
			:values="$users"
			:xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
			:placeholder="__('caption.labels.select-label')"
			extraAttribute="required"
		>
		</x-dropdown-list>

		<x-dropdown-list
			idName="post_id"
			:initValue="(old('post_id')??$reaction->post_id)??null"
			:caption="__('caption.cms.fields.reaction.post_id')"
			:values="$posts"
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
