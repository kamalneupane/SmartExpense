@extends('layouts.main')
@section('content')

    <div class="add-company mt-5">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="text-center">Add new user</h2>
        </div>
        <div class="col-sm-4 mt-1">
            <a href="{{route('user.index')}}">
                <button class="btn btn-primary btn-block">All Users <i class="fa fa-arrow-circle-left"></i></button>
            </a>
        </div>
    </div>
    <hr>
    <div class="col-sm-8 offset-sm-2">
    <div class="col-sm-12"></div>
    <div class="col-sm-12 register-top"> 
        <form method="POST" class="form-horizontal register-container " action="{{ route('user.store') }}">
            {{csrf_field() }}
            
            <input type="hidden" value="{{Auth::user()->company_id}}" name="company_id">
            <input type="hidden" value="{{Auth::user()->country}}" name="country">
            <input type="hidden" value="{{Auth::user()->state}}" name="state">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-8 ">
                    <input id="name" name="name" type="text" class="form-control" autocomplete="name">

                    @error('name')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label ">Email:</label>
                <div class="col-sm-8">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password:</label>

                <div class="col-sm-8">
                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="form-control-label col-sm-2">Country:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="country" id="country" onchange="get_zones($(this).val())">
                        <option value="">chose country</option>
                            <?php
                            $countries = DB::select(DB::raw('select * from countries'));
                            ?>
                            @if(count($countries)>0)
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->names}}</option>
                                @endforeach
                            @endif
                    </select>
                    @error('country')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">City:</label>
                <div class="col-sm-8">
                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" autocomplete="city">
                    @error('city')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label" >Role:</label>
                <div class="col-sm-8">
                    <select class="form-control"  name="role" id="role" onchange="accessibilities($(this).val())">
                        <option value="">Chose Role</option>
                        @if(count($roles)>0)
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row" id="accessibilities">
                <label for="permissions" class="col-sm-2 form-control-label">Permissions:</label>
                <div class="col-sm-10">
                    @if(count($companies))
                        @foreach($companies as $company)
                            <label for=""><input type="checkbox" value="{{ $company->id }}" name="access[{{ $company->id}}]" onclick="categories($(this),{{ $company->id}})"> &nbsp;{{ $company->name }} </label>
                                @if(\App\Models\Category::whereUser($company->id))
                                    <ul style="list-style: none;" id="checkbox_{{ $company->id}}">
                                        @foreach(\App\Models\Category::whereUser($company->id) as $category)
                                            <li><label for=""><input type="checkbox" value="{{$category->id}}" name="access[{{ $company->id }}][]" class="categories" > &nbsp; {{$category->name}}</label></li>
                                        @endforeach      
                                    </ul>
                                @endif    
                        @endforeach
                    @endif        
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-8">
                    <select class="form-control"  name="status" id="status">
                        <option value="on">Active</option>
                        <option value="off">Deactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Register" class="btn btn-success btn-block">
                </div>
            </div>
        </form>  
        
    </div>
</div>
    </div>  

@endsection

@section('script')
    <script>
    function categories(e,id){
        if(e.is(":checked")){

        }else{
            $("#checkbox_"+id).hide();
        }
    }

    function accessibilities(role){
        if(role == 1 || role == ''){
            $("#accessibilities").attr("type", "checkbox");
            $("#accessibilities").show();
        }
        if(role == 2){
            $(".categories").attr("type", "checkbox");
            $("#accessibilities").show();
        }
        if(role == 3){
            $(".categories").attr("type", "radio");
            $("#accessibilities").show();
        }
    }

    </script>




@endsection