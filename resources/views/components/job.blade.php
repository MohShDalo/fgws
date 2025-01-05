<div class="card mb-3">
    <div class="card-header"  style="text-align: center">
        {{__('caption.home.job-title',['name'=>$job->owner_name,'date'=>$job->created_at->diffForHumans()])}}
    </div>
    <div class="card-body">
        {{$job->content}}
    </div>
    <div class="card-footer">
        <form action="{{route('comment.store')}}" method="POST">
            <div class="row">
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
                <dl>
                    @foreach ($job->offers as $offer)
                        <dt>{{$offer->created_by_name}}</dt>
                        <dd>{{$offer->content}}</dd>
                    @endforeach
                </dl>
                <x-textfield
                    :xl="8" :lg="8" :md="4" :sm="12" parentClass="mb-3"
                    idName="content"
                    :initValue="old('content')"
                    type="text"
                    :hint="null"
                    :placeholder="__('caption.labels.hint.offer')"
                    extraAttribute="required"
                ></x-textfield>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
                    <label for=""></label>
                    <input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.save')}}">
                </div>
            </div>
        </form>
    </div>
</div>
