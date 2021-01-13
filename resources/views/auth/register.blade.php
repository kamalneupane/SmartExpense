@extends('layouts.authApp')

@section('authContent')
<div class="col-sm-8 offset-sm-2">
    <div class="col-sm-12"></div>
    <div class="col-sm-12 register-top"> 
        <form method="POST" class="form-horizontal register-container " action="{{ route('register') }}">
            {{csrf_field() }}

            <div class="form-group">
                <div class="col-sm-12">
                    <h2 class="text-center">Sign up to <span class="text-color">Smart Expenses Keeping</span> </h2>
                </div>
            </div>

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
                <label for="password-confirm" class="col-sm-2 col-form-label ">Confirm Password:</label>

                <div class="col-sm-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="form-control-label col-sm-2">Country</label>
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
                <label for="state" class="form-control-label col-sm-2">State</label>
                <div class="col-sm-8">
                    <select class="form-control" name="state" id="state">
                        
                        <!-- <option value="">Choose State</option> -->
                        
                    </select>
                    <img src="{{asset('img/spinner.gif')}}" id="loader" style="position:absolute; right: -35px; top:0px; display:none" height="38px" width="40px">
                    @error('state')
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
            <!-- <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">Logo:</label>
                <div class="col-sm-8">
                    <input id="logo" type="file" class="form-control" name="logo" value="{{ old('logo') }}">

                    @error('logo')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> -->

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Register" class="btn btn-danger btn-block">
                </div>
            </div>
        </form>  
        <h5 class="text-center">Already have an account?<a href="{{route('login')}}">Sign In</a></h5> 
        <div class="col-sm-10"></div>
    </div>
</div>
    
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            

        });
        function get_zones(id){
            $('#loader').show();
            $.post("/auth/get_zones",{id:id,_token:"{{csrf_token()}}"}).done(function(e){
                $("#state").html(e);
                $("#loader").hide();
            });
        }
        
    </script>
@endsection
