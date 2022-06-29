@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end actions my-3">
                    <a href="{{ route('persons.create') }}" class="btn btn-outline-primary">Create</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Persons') }}</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-info" role="alert">
                                <div>{{$errors->first()}}</div>
                            </div>
                        @endif
                        @if($persons->count() > 0)
                            <div id="persons">
                                <div class="persons">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Birthday</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Country</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($persons as $id => $person)
                                            <tr>
                                                <th scope="row">{{ ++$id }}</th>
                                                <td>
                                                    <a href="{{route('persons.show', $person->id)}}">
                                                        {{$person->name}}
                                                    </a>
                                                </td>
                                                <td>{{$person->birthday->toFormattedDateString()}}</td>
                                                <td>{{$person->gender}}</td>
                                                <td>{{$person->address->city_name}}</td>
                                                <td>{{$person->address->country_name}}</td>
                                                <td class="actions">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{route('persons.show', $person->id)}}"
                                                           class="btn btn-success mx-1">
                                                            Show
                                                        </a>
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
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                {{ __('None records') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
