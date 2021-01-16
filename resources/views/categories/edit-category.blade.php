@extends('layouts.main')
    @section('content')
    <div class="col-sm-12 m-auto">
        <h4>Update Category</h4>
       <hr>
        <form action="{{ route('category.update',$category->id)}}" class="form-inline" method="post">
            {{csrf_field()}}
            <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}" id="">
            <div class="form-group">
                <label for="name" class="col-sm-2">Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" value="{{$category->name}}" name="name">
                </div>
            </div>
            <button class="btn btn-success col-sm-4" type="submit">Update</button>
        </form>
        @error('name')
            <span class="help-block text-color">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    @endsection


