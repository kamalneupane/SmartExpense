@extends('layouts.main')
    @section('content')
        <div class="add-company mt-5">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 title">
                <h2>{{$title}}</h2>
            </div>
            <div class="col-sm-3 offset-sm-1">
                <a href="{{route('company.index')}}" class="btn btn-primary">List Of companies &nbsp; <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
            
                <form class="form" action="{{route('company.store')}}" method="POST" role="form">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 ml-2" style="font-size:20px">Company Name:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span class="help-block text-color">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" style="font-size:20px"class="mb-5 btn btn-info col-sm-4 offset-sm-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    @endsection