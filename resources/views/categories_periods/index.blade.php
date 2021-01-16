@extends('layouts.main')
@section('content')
    <div class="row">
        
        @include('periods.create')
        @include('categories.create-category')
    </div>
    <div class="row" style="height:50px;"></div>
    <div class="row">
        @include('periods.list-period')
        @include('categories.list-category')
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $("#from").datepicker({
                defaultDate:    "+1w",
                changeMonth:    true,
                numberOfMonth:  1,
                changeYear:     true,
                dateFormat:     "yy-mm-dd",
            });
            $("#to").datepicker({
                defaultDate:    "+1w",
                changeMonth:    true,
                numberOfMonth:  1,
                changeYear:     true,
                dateFormat:     "yy-mm-dd",
            });
        });
    </script>
@endsection