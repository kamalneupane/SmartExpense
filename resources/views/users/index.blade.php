@extends('layouts.main')

@section('content')
    <div class="add-company row mt-5">
        <div class="col-sm-8">
            <h2 class="text-center">List of users</h2>
        </div>
        <div class="col-sm-4 mt-2">
            <a href="{{route('user.create')}}">
                <button class="btn btn-primary btn-block">Add new user &nbsp;<i class="fa fa-plus"></i></button>
            </a>
        </div>
    </div>

@endsection