@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <x-job :job="$job">
            </x-job>
        </div>
    </div>
</div>
@endsection
