<div class="card mb-3">
    <div class="card-header"  style="text-align: center">
        {{__('caption.home.job-title',['name'=>$job->owner_name,'job'=>$job->needed_postion,'date'=>$job->created_at->diffForHumans()])}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 form-floating col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                <input type="text" readonly class="form-control" value="{!!$job->needed_postion??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.needed_postion')}}</label>
            </div>
            <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <input type="text" readonly class="form-control" value="{!!$job->owner_name??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.owner_id')}}</label>
            </div>

            <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <input type="text" readonly class="form-control" value="{!!$job->max_price_text??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.max_price')}}</label>
            </div>
            <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <input type="text" readonly class="form-control" value="{!!$job->max_time_text??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.max_time')}}</label>
            </div>
            <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <input type="text" readonly class="form-control" value="{!!$job->expected_start_date_formated??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.expected_start_date')}}</label>
            </div>

            <div class="mb-3 form-floating col-12">
                <input type="text" readonly class="form-control" value="{!!$job->content??'-'!!}">
                <label for="">{{__('caption.cms.fields.job.content')}}</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form action="{{route('offer.store')}}" method="POST">
            <div class="row">
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
                <dl>
                    @forelse ($job->offers as $offer)
                        <dt>
                            {{$offer->owner_name}}
                            <sub>({{$offer->time.'-Days, '.$offer->price.'-$'}})</sub>
                            {{-- {{route('reaction.store')}}?post_id={{$post->id}}&type={{\App\Models\Reaction::TYPE_LIKE}} --}}
                            @can('approve', $offer)
                            <a href="{{route('offer.approve',$offer->id)}}" class="icon">
                                <i class="bi bi-{{$offer->isApproved()?'x':'check'}}-circle"></i>
                            </a>
                            @endcan
                        </dt>

                        <dd>{{$offer->content}}</dd>
                    @empty
                        <dt style="text-align: center;">{{__('messages.other.no-offers')}}</dd>
                    @endforelse
                </dl>
                @can('create', \App\Models\Offer::class)
                <x-textarea
                    :xl="12" :lg="12" :md="12" :sm="12" parentClass="mb-3"
                    idName="content"
                    :caption="__('caption.cms.fields.offer.content')"
                    :initValue="old('content')"
                    :rows="4"
                    :cols="10"
                    :placeholder="__('caption.labels.hint.offer')"
                    extraAttribute="required"
                ></x-textarea>

                <x-textfield
                    :xl="4" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                    idName="price"
                    :caption="__('caption.cms.fields.offer.price')"
                    :initValue="old('price')"
                    type="text"
                    :hint="null"
                    :placeholder="__('caption.labels.hint.price')"
                    extraAttribute="required"
                ></x-textfield>

                <x-textfield
                    :xl="4" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                    idName="time"
                    :caption="__('caption.cms.fields.offer.time')"
                    :initValue="old('time')"
                    type="text"
                    :hint="null"
                    :placeholder="__('caption.labels.hint.time')"
                    extraAttribute="required"
                ></x-textfield>
                <input type="hidden" name="owner_id" value="{{\Auth::user()->id}}" >
                <input type="hidden" name="job_id" value="{{$job->id}}" >
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <label for=""></label>
                    <input type="submit" class="pt-2 form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.save')}}">
                </div>
                @endcan
            </div>
        </form>
    </div>
</div>
