@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.reaction-menu.view',['name'=>$reaction->id??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.reaction-menu.view',["name"=>$reaction->id??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reaction.type')}}</label>
						<div class="form-control">{!!$reaction->type_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reaction.created_by_id')}}</label>
						<div class="form-control">{!!$reaction->created_by_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reaction.post_id')}}</label>
						<div class="form-control">{!!$reaction->post_content??'-'!!}</div>
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
				<a href="{{route('reaction.edit',$reaction->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('reaction.destroy',$reaction->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$reaction->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($reaction->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
