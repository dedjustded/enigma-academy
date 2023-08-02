@extends('layouts.admin-dash-layout')
@section('content')
<head>
  <title>Add / Edit</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        Edit user
      </div>
      <div class="card-body">
          <form name="user_details" id="user_details" method="post" action="{{ url('/updateMydetails/' . ($user->id)) }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">First name</label>
              <input type="text" id="first_name" name="first_name" value="{{ $user->first_name ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Last name</label>
              <input type="text" id="last_name" name="last_name" value="{{ $user->last_name ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" id="email" name="email" value="{{ $user->email ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone number</label>
              <input minlength="8" maxlength="13" id="phone" name="phone" value="{{ $user->phone ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Country</label>
              <input type="text" id="country" name="country" value="{{ $user->country ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">City</label>
              <input type="text" id="city" name="city" value="{{ $user->city ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Language</label>
              <input type="text" id="language" name="language" value="{{ $user->language ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Github Repository</label>
              <input type="text" id="repository" name="repository" value="{{ $user->repository ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">LinkedIn</label>
              <input type="text" id="link" name="link" value="{{ $user->link ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" id="username" name="username" value="{{ $user->username ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Hobbies</label>
              <input type="text" id="hoby" name="hoby" value="{{ $user->hoby ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Skills</label>
              <input type="text" id="skils" name="skils" value="{{ $user->skils ?? ' ' }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</body>
@endsection