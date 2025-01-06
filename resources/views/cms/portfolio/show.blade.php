@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.portfolio-menu.view',['name'=>$portfolio->title??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.portfolio-menu.view',["name"=>$portfolio->title??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.title')}}</label>
						<div class="form-control">{!!$portfolio->title??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.release_date')}}</label>
						<div class="form-control">{!!$portfolio->release_date_formated??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.link')}}</label>
						<div class="form-control">{!!$portfolio->link??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.category')}}</label>
						<div class="form-control">{!!$portfolio->category_text??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.mockup_image')}}</label>
						<div class="form-control">{!!$portfolio->mockup_image??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.file')}}</label>
						<div class="form-control">{!!$portfolio->file??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.note')}}</label>
						<div class="form-control">{!!$portfolio->note??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.portfolio.freelancer_id')}}</label>
						<div class="form-control">{!!$portfolio->freelancer_id??'-'!!}</div>
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
				<a href="{{route('portfolio.edit',$portfolio->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('portfolio.destroy',$portfolio->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$portfolio->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($portfolio->deleted_at?'restore':'delete'))}}">
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
