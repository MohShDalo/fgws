@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">{{ __('caption.home.last-jobs') }}</div>
                <div class="card-body max-full-height">
                    <div class="row">
                        <ul>
                            @forelse ($jobs as $job)
                            <li>
                                <a href="{{route('home.job.show',$job->id)}}">
                                    {{__('caption.home.job-title',[
                                        'name'=>$job->owner_company_name,
                                        'job'=>$job->needed_postion,
                                        'date'=>$job->created_at->diffForHumans()
                                    ])}}
                                </a>
                            </li>
                            @empty
                                <span>{{__('caption.home.no-jobs')}}</span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 mb-3 max-full-height overflow-y-scoll" style="height: 82vh;overflow-y:scroll">
            <div class="row">
                <div class="col-12" >
                    @forelse ($posts as $post)
                        <x-post :post="$post">
                        </x-post>
                    @empty
                        <div class="pt-5 mt-5"  style="text-align: center">
                            {{__('caption.home.no-posts')}}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
