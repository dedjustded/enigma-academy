@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="first name" required="required" autofocus>
            <label for="floatingName">First Name</label>
            @if ($errors->has('first_name'))
                <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="last name" required="required" autofocus>
            <label for="floatingName">Last Name</label>
            @if ($errors->has('last_name'))
                <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>    
              

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
    </form>
@endsection
