@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <x-post :post="$post">
            </x-post>
        </div>
    </div>
</div>
@endsection
