@extends('layouts.main')

@section('content')
<div class="col-sm-6">
    <h4>Edit Period</h4>
        @error('from')
            <span class="help-block text-color">
                {{$message}}
            </span>
        @enderror
    <hr>
    <form action="{{ route('period.update',$period->id)}}" class="form-inline" method="post">
        {{csrf_field()}}
        <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}" id="">
        <div class="form-group">
            <label for="range" class="col-sm-2">Range:</label>
            <div class="col-sm-10">
                <div class="input-datarange input-group" id="data-range">
                <input type="text" name="from" id="from" value="{{$period->from}}" size="15px" autocomplete="off">
                <span style="background-color:rgb(0, 0, 0); color:white; padding:6px;">to</span>
                <input type="text" name="to" id="to" size="15px" value="{{$period->to}}" autocomplete="off">
                </div>
            </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>

@endsection
@section('script')
    <script>
        $(function(){
            $("#from").datepicker({
                defaultDate:    "+1",
                changeMonth:    true,
                numberOfMonth:  1,
                changeYear:     true,
                dateFormat:    "yy-mm-dd",      
            });
            $("#to").datepicker({
                defaultDate:    "+1",
                changeMonth:    true,
                numberOfMonth:  1,
                changeYear:     true,
                dateFormat:    "yy-mm-dd",      
            });
        });
    </script>
@endsection