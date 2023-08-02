@extends('layouts.auth-master')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@elseif (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<form method="post" action="saveNewPassword/{{Auth::user()->id}}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <h1 class="h3 mb-3 fw-normal">Change password</h1>
    @include('layouts.partials.messages')

    <div class="form-group form-floating mb-3">
        <input type="password" class="form-control" name="old_password" value="{{ old('password') }}" placeholder="Enter old password" required="required">
        <label for="floatingPassword">Password</label>
        @if ($errors->has('password'))
        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group form-floating mb-3">
        <input type="password" class="form-control" name="new_password1" placeholder="Enter new password" required="required">
        <label for="floatingPassword">Password</label>
    </div>
    <div class="form-group form-floating mb-3">
        <input type="password" class="form-control" name="new_password2" placeholder="Enter new password" required="required">
        <label for="floatingPassword">Password</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>

    <div class="forgot_password">
        <a href="/forgot-password-form">Forgot password?</a>
    </div>

</form>
@endsection