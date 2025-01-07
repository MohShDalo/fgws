@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('type') && session('message') || $errors->any())
		<div class="row">
			@if(false)
			<div class="alert alert-danger">
				<ul  class="m-0">
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(session('extra_message'))
				<div class="alert alert-warning">
					{!!session()->pull('extra_message')!!}
				</div>
			@endif
			@if(session('type') && session('message'))
				<div class="alert alert-{{session()->pull('type')}}">
					{!!session()->pull('message')!!}
				</div>
			@endif
		</div>
    @endif
    <div class="row">
        <div class="col-12">
            <x-job :job="$job">
            </x-job>
        </div>
    </div>
</div>
@endsection
