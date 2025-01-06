@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="row">
                            <x-textfield
                                :xl="6" :lg="6" :md="6" :sm="12" parentClass="mb-3"
                                idName="name"
                                :caption="__('caption.cms.fields.user.name')"
                                :initValue="old('name')"
                                type="text"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-textfield
                                :xl="6" :lg="6" :md="6" :sm="12" parentClass="mb-3"
                                idName="email"
                                :caption="__('caption.cms.fields.user.email')"
                                :initValue="old('email')"
                                type="email"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-textfield
                                :xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                                idName="password"
                                :caption="__('caption.cms.pages.login.password')"
                                :initValue="old('password')"
                                type="password"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-textfield
                                :xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                                idName="password_confirmation"
                                :caption="__('caption.cms.pages.login.password_confirmation')"
                                :initValue="old('password_confirmation')"
                                type="password"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-textfield
                                :xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                                idName="contact_number"
                                :caption="__('caption.cms.fields.user.contact_number')"
                                :initValue="old('contact_number')"
                                type="text"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-textfield
                                :xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                                idName="birth_date"
                                :caption="__('caption.cms.fields.user.birth_date')"
                                :initValue="old('birth_date')"
                                type="date"
                                :hint="null"
                                placeholder=""
                                extraAttribute="required"
                            ></x-textfield>

                            <x-dropdown-list
                                idName="gender"
                                :initValue="old('gender')"
                                :caption="__('caption.cms.fields.user.gender')"
                                :values="__('values.user.gender')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute="required"
                            >
                            </x-dropdown-list>

                            <x-dropdown-list
                                idName="marital_status"
                                :initValue="old('marital_status')"
                                :caption="__('caption.cms.fields.user.marital_status')"
                                :values="__('values.user.marital_status')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute="required"
                            >
                            </x-dropdown-list>

                            <x-dropdown-list
                                idName="nationality"
                                :initValue="old('nationality')"
                                :caption="__('caption.cms.fields.user.nationality')"
                                :values="__('values.user.nationality')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute="required"
                            >
                            </x-dropdown-list>

                            <x-dropdown-list
                                idName="city"
                                :initValue="old('city')"
                                :caption="__('caption.cms.fields.user.city')"
                                :values="__('values.user.city')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute=""
                            >
                            </x-dropdown-list>

                            <x-dropdown-list
                                idName="country"
                                :initValue="old('country')"
                                :caption="__('caption.cms.fields.user.country')"
                                :values="__('values.user.country')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute=""
                            >
                            </x-dropdown-list>

                            <x-textfield
                                :xl="3" :lg="4" :md="4" :sm="6" parentClass="mb-3"
                                idName="address_details"
                                :caption="__('caption.cms.fields.user.address_details')"
                                :initValue="old('address_details')"
                                type="text"
                                :hint="null"
                                placeholder=""
                                extraAttribute=""
                            ></x-textfield>



                            <x-dropdown-list
                                idName="roleable_type"
                                :initValue="old('roleable_type')"
                                :caption="__('caption.cms.fields.user.roleable_type')"
                                :values="__('values.user.roleable_type')"
                                :xl="3"	:lg="4"	:md="4"	:sm="6"	parentClass="mb-3"
                                :placeholder="__('caption.labels.select-label')"
                                extraAttribute="required"
                            >
                            </x-dropdown-list>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                                <input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.save')}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var requiredInputs = document.querySelectorAll('input[required], select[required], textarea[required]');
    requiredInputs.forEach(function(input) {
        var label = document.querySelector(`label[for="${input.id}"]`);
        if (label) {
            var span = document.createElement('span');
            span.textContent = ' *';
            span.style.color = 'red';
            label.appendChild(span);
        }
    });
    });
</script>

@endpush
@endsection
