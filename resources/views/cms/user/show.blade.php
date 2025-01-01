@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.user-menu.view',['name'=>$user->name??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.user-menu.view',["name"=>$user->name??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.name')}}</label>
						<div class="form-control">{!!$user->name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.image')}}</label>
						<div class="form-control">{!!$user->image??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.cover')}}</label>
						<div class="form-control">{!!$user->cover??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.email')}}</label>
						<div class="form-control">{!!$user->email??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.contact_number')}}</label>
						<div class="form-control">{!!$user->contact_number??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.birth_date')}}</label>
						<div class="form-control">{!!$user->birth_date_formated??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.gender')}}</label>
						<div class="form-control">{!!$user->gender_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.marital_status')}}</label>
						<div class="form-control">{!!$user->marital_status_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.nationality')}}</label>
						<div class="form-control">{!!$user->nationality_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.city')}}</label>
						<div class="form-control">{!!$user->city_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.country')}}</label>
						<div class="form-control">{!!$user->country_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.address_details')}}</label>
						<div class="form-control">{!!$user->address_details??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.user.roleable_type')}}</label>
						<div class="form-control">{!!$user->roleable_type??'-'!!}</div>
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
				<a href="{{route('user.edit',$user->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('user.destroy',$user->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$user->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($user->deleted_at?'restore':'delete'))}}"> 
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
	:dataRecord="$user->comments()"
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
	:resetUrl="route('user.show',$user->id)"
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
	:dataRecord="$user->reactions()"
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
	:resetUrl="route('user.show',$user->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.chat-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_chats"
	model="\\App\\Models\\Chat"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$user->chats()"
	:otherRoutes="[]"
	showRoute="chat.show"
	editRoute="chat.edit"
	deleteRoute="chat.destroy"
	:fieldsNames="['title','first_member_name','second_member_name','created_by_name',]"
	:colLabels="[
				__('caption.cms.fields.chat.title'),
				__('caption.cms.fields.chat.first_member_id'),
				__('caption.cms.fields.chat.second_member_id'),
				__('caption.cms.fields.chat.created_by_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('user.show',$user->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.chat-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_chats"
	model="\\App\\Models\\Chat"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$user->chats()"
	:otherRoutes="[]"
	showRoute="chat.show"
	editRoute="chat.edit"
	deleteRoute="chat.destroy"
	:fieldsNames="['title','first_member_name','second_member_name','created_by_name',]"
	:colLabels="[
				__('caption.cms.fields.chat.title'),
				__('caption.cms.fields.chat.first_member_id'),
				__('caption.cms.fields.chat.second_member_id'),
				__('caption.cms.fields.chat.created_by_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('user.show',$user->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.chat-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_chats"
	model="\\App\\Models\\Chat"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$user->chats()"
	:otherRoutes="[]"
	showRoute="chat.show"
	editRoute="chat.edit"
	deleteRoute="chat.destroy"
	:fieldsNames="['title','first_member_name','second_member_name','created_by_name',]"
	:colLabels="[
				__('caption.cms.fields.chat.title'),
				__('caption.cms.fields.chat.first_member_id'),
				__('caption.cms.fields.chat.second_member_id'),
				__('caption.cms.fields.chat.created_by_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('user.show',$user->id)"
></x-table>
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
	:dataRecord="$user->messages()"
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
	:resetUrl="route('user.show',$user->id)"
></x-table>
@endsection
