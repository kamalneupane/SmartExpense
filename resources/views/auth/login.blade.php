@extends('layouts.authApp')

@section('authContent')
<div class="col-sm-4"></div>
<div class="col-sm-4 register-top-login">
    <form class="form-horizontal register-container tb-padding" role="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <div class="col-sm-12">
                <h3 class="text-center">Login to <span class="text-color">Smart Expense Keeping</span></h3>
            </div>
        </div>

        <div class="form-group">
    

            <div class="col-sm-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                @error('email')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">


            <div class="col-sm-12">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="password">

                @error('password')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <input type="checkbox" name="remember"{{ old('remember') ? 'checked' : '' }}>
            </div>
            <div class="col-sm-8 offset-2 no-padding margin-style">Remember me</div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" value="login" class="btn btn-danger btn-block">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <i class="fa fa-lock"></i><a href="{{route('password.request')}}" class="forgot-link">forgot your password</a>
            </div>
        </div>
    </form>
    <h5 class="text-center">Don't have an account? <a href="{{route('register')}}">Sign up</a></h5>
</div>
@endsection
