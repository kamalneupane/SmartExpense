@extends('layouts.authApp')

@section('authContent')


<div class="col-md-8 offset-sm-2">
    <div class="card">
        <div class="card-header">Reset Password</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email Address:</label>

                    <div class="col-sm-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <input type="submit" class="btn btn-danger btn-block" value="send password reset link">
                    </div>
                </div>
            </form>
            <h5>Don't have an account? <a href="{{route('register')}}">Sign Up</a></h5>
            <h5>Go Home <a href="{{route('login')}}">Sign In</a></h5>
        </div>
    </div>
</div>
    

@endsection
