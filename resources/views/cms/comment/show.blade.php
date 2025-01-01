@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.comment-menu.view',['name'=>$comment->content??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.comment-menu.view',["name"=>$comment->content??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.comment.content')}}</label>
						<div class="form-control">{!!$comment->content??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.comment.created_by_id')}}</label>
						<div class="form-control">{!!$comment->created_by_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.comment.post_id')}}</label>
						<div class="form-control">{!!$comment->post_content??'-'!!}</div>
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
				<a href="{{route('comment.edit',$comment->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('comment.destroy',$comment->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$comment->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($comment->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
