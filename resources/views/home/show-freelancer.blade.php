@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <?php $user = $freelancer->user;?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <img src="{{$user->image}}" alt="profile-image" width="100%">
        </div>
        <div class="col-xl-9 col-lg-8 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body" style="background-image: url({{$user->cover}})">
                    <div class="row py-3" style="background-color: rgb(255,255,255,48%);border-radius: 20px;">

                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->name??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.name')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->email??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.email')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->contact_number??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.contact_number')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->birth_date_formated??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.birth_date')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->gender_text??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.gender')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->marital_status_text??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.marital_status')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->nationality_text??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.nationality')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->city_text??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.city')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->country_text??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.country')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$user->address_details??'-'!!}">
                            <label for="">{{__('caption.cms.fields.user.address_details')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$freelancer->main_career??'-'!!}">
                            <label for="">{{__('caption.cms.fields.freelancer.main_career')}}</label>
                        </div>
                        <div class="mb-3 form-floating col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <input type="text" readonly class="form-control" value="{!!$freelancer->place_of_birth??'-'!!}">
                            <label for="">{{__('caption.cms.fields.freelancer.place_of_birth')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $relations = ["education","language","certificate","experience","skill","portfolio","reference",];
        ?>
        @foreach ($relations as $relation)
            <?php
                $listOfData = $freelancer->{$relation.'s'};
                if($listOfData->count()==0)
                    continue;
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mt-3" style="border-right: 1px solid black;">
                <h3>{{__("caption.cms.menu-item.$relation-menu.index")}}</h3>

            </div>
            <div class="col-xl-9 col-lg-8 col-md-6 col-sm-12 mt-3">
                <ul>
                @foreach ($listOfData as $record)
                    @if(isset($record->show)&& !$record->show)
                    @continue
                    @endif
                    <li>{!!$record->html_text!!}</li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-2">
            <button class="btn btn-outline-info"
                onclick="document.getElementsByTagName('nav')[0].classList.add('d-none');this.classList.add('d-none');window.print();this.classList.remove('d-none');document.getElementsByTagName('nav')[0].classList.remove('d-none')"
            >Print PDF</button>
        </div>
    </div>
</div>


@endsection
