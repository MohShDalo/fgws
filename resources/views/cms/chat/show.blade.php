@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.chat-menu.view',['name'=>$chat->title??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.chat-menu.view',["name"=>$chat->title??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.chat.title')}}</label>
						<div class="form-control">{!!$chat->title??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.chat.first_member_id')}}</label>
						<div class="form-control">{!!$chat->first_member_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.chat.second_member_id')}}</label>
						<div class="form-control">{!!$chat->second_member_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.chat.created_by_id')}}</label>
						<div class="form-control">{!!$chat->created_by_name??'-'!!}</div>
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
				<a href="{{route('chat.edit',$chat->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('chat.destroy',$chat->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$chat->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($chat->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.message-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_messages"
	model="\\App\\Models\\Message"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$chat->messages()"
	:otherRoutes="[]"
	showRoute="message.show"
	editRoute="message.edit"
	deleteRoute="message.destroy"
	:fieldsNames="['content','created_by_name','chat_title',]"
	:colLabels="[
				__('caption.cms.fields.message.content'),
				__('caption.cms.fields.message.created_by_id'),
				__('caption.cms.fields.message.chat_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('chat.show',$chat->id)"
></x-table>
@endsection
