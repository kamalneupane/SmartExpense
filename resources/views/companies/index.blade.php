@extends('layouts.main')
@section('content')

<div class="add-company mt-5 mb-5">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h2 class="mt-4" style="font-size:40px">List of Companies</h2>
    </div>
    <div class="col-sm-4">
        <a href="{{route('company.create')}}" class="btn btn-info mt-4">{{ trans('app.companies-create')}} &nbsp;<i class="fa fa-plus"></i></a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 mx-auto">
    <?php
        $i = 0;
    ?>
    @if(count($companies)>0)    
        @foreach($companies as $company)
                <?php
                    $class = (Auth::user()->company_id == $company->id ? "bg-{$colors[$i]}" : "border-{$colors[$i]}");
                ?>
                    <a href="{{ route('company.active','company='.urlencode(base64_encode($company->id))) }}" style="text-decoration:none">
                    <div class="departs-group {{$class}}">
                        <p>{{$company->name}}</p>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
</div>

@endsection