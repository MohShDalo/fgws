@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.message-menu.view',['name'=>$message->content??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.message-menu.view',["name"=>$message->content??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.message.content')}}</label>
						<div class="form-control">{!!$message->content??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.message.created_by_id')}}</label>
						<div class="form-control">{!!$message->created_by_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.message.chat_id')}}</label>
						<div class="form-control">{!!$message->chat_title??'-'!!}</div>
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
				<a href="{{route('message.edit',$message->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('message.destroy',$message->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$message->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($message->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
