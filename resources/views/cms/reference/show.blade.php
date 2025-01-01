@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.reference-menu.view',['name'=>$reference->full_name??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.reference-menu.view',["name"=>$reference->full_name??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.full_name')}}</label>
						<div class="form-control">{!!$reference->full_name??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.contact_number')}}</label>
						<div class="form-control">{!!$reference->contact_number??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.email')}}</label>
						<div class="form-control">{!!$reference->email??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.postion')}}</label>
						<div class="form-control">{!!$reference->postion??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.note')}}</label>
						<div class="form-control">{!!$reference->note??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.reference.freelancer_id')}}</label>
						<div class="form-control">{!!$reference->freelancer_id??'-'!!}</div>
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
				<a href="{{route('reference.edit',$reference->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('reference.destroy',$reference->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$reference->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($reference->deleted_at?'restore':'delete'))}}"> 
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
