@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-start actions my-3">
                    <a href="{{ route('persons.index') }}" class="btn btn-link">&laquo; {{__('Back')}}</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Person') }}</div>
                    <div class="card-body">
                        @if($errors->count())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('persons.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-2">{{__('Person information')}}</h5>
                                    <div class="form-group mb-3">
                                        <label class="mb-1" for="name">{{__('Name')}}</label>
                                        <input type="text"
                                               class="form-control" id="name"
                                               name="name"
                                               placeholder="Enter person name"
                                               value="{{ old('name') }}"
                                        >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="mb-1" for="birthday">{{__('Birthday')}}</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday"
                                               placeholder="Enter birthday"
                                               value="{{ old('birthday') }}"
                                        >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-check-label mb-1" for="gender">{{__('Gender')}}</label>
                                        <select class="form-control " name="gender" id="gender">
                                            <option selected value="0">Select gender</option>
                                            @foreach(\App\Enums\GenderEnum::getGenders() as $key => $gender)
                                                <option value="{{$key}}">{{__($gender)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-2">{{__('Address information')}}</h5>
                                    <div class="form-group mb-3">
                                        <label for="address" class="mb-1">{{__('Address')}}</label>
                                        <input class="form-control" id="address" name="address"
                                               placeholder="Enter address"
                                               value="{{ old('address') }}"
                                        >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div
                                                class="form-group mb-3">
                                                <label for="post_code" class="mb-1">{{__('Post code')}}</label>
                                                <input class="form-control" id="post_code" name="post_code"
                                                       placeholder="Enter post_code"
                                                       value="{{ old('post_code') }}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div
                                                class="form-group mb-3">
                                                <label for="city_name" class="mb-1">{{__('City name')}}</label>
                                                <input class="form-control" id="city_name" name="city_name"
                                                       placeholder="Enter city name"
                                                       value="{{ old('city_name') }}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div
                                                class="form-group mb-3">
                                                <label for="country_name" class="mb-1">{{__('Country name')}}</label>
                                                <input class="form-control" id="country_name" name="country_name"
                                                       placeholder="Enter country name"
                                                       value="{{ old('country_name') }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
