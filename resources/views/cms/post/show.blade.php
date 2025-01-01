@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.post-menu.view',['name'=>$post->content??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.post-menu.view',["name"=>$post->content??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.post.content')}}</label>
						<div class="form-control">{!!$post->content??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.post.image')}}</label>
						<div class="form-control">{!!$post->image??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.post.owner_id')}}</label>
						<div class="form-control">{!!$post->owner_id??'-'!!}</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<!-- Note -->
			</div>
		</div>
	</div>
	<div class="col-12 mt-3">
		<div class="row justify-content-center">
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('post.destroy',$post->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$post->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($post->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.comment-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_comments"
	model="\\App\\Models\\Comment"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$post->comments()"
	:otherRoutes="[]"
	showRoute="comment.show"
	editRoute="comment.edit"
	deleteRoute="comment.destroy"
	:fieldsNames="['content','created_by_name','post_content',]"
	:colLabels="[
				__('caption.cms.fields.comment.content'),
				__('caption.cms.fields.comment.created_by_id'),
				__('caption.cms.fields.comment.post_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('post.show',$post->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.reaction-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_reactions"
	model="\\App\\Models\\Reaction"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$post->reactions()"
	:otherRoutes="[]"
	showRoute="reaction.show"
	editRoute="reaction.edit"
	deleteRoute="reaction.destroy"
	:fieldsNames="['type_text','created_by_name','post_content',]"
	:colLabels="[
				__('caption.cms.fields.reaction.type'),
				__('caption.cms.fields.reaction.created_by_id'),
				__('caption.cms.fields.reaction.post_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('post.show',$post->id)"
></x-table>
@endsection
