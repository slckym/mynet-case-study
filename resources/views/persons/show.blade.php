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
                    <div class="card-header">{{ __('Edit Person') }}: {{$person->name}}</div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-2">{{__('Person information')}}</h5>
                                <div class="mb-3">
                                    <span class="mb-1">{{__('Name')}}: </span>
                                    <span>{{$person->name}}</span>
                                </div>
                                <div class="mb-3">
                                    <span class="mb-1">{{__('Birthday')}}: </span>
                                    <span>{{$person->birthday->toFormattedDateString()}}</span>
                                </div>
                                <div class="mb-3">
                                    <span class="mb-1">{{__('Gender')}}: </span>
                                    <span>{{$person->gender}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-2">{{__('Address information')}}</h5>
                                <div class="mb-3">
                                    <span class="mb-1">{{__('Address')}}: </span>
                                    <span>{{$person->address->address}}</span>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <span class="mb-1">{{__('Post code')}}: </span>
                                        <span>{{$person->address->post_code}}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="mb-1">{{__('City name')}}:</span>
                                        <span>{{$person->address->city_name}}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="mb-1">{{__('Country name')}}:</span>
                                        <span>{{$person->address->country_name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-end">
                                <a href="{{route('persons.edit', $person->id)}}"
                                   class="btn btn-primary mx-1">
                                    Edit
                                </a>
                                <form id="delete-form" method="POST"
                                      action="{{route('persons.destroy', $person->id)}}"
                                      onsubmit="return confirm('Are you sure?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick=""
                                            class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
