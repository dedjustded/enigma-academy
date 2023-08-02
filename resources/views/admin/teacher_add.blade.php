@extends('layouts.admin-dash-layout')
@section('content')

<head>
  <title>Add / Edit Teacher</title>
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
        Add/Edit teacher
      </div>
      <div class="card-body">
        @if(!$teacher)
        <form name="user_details" id="user_details" method="post" action="{{ url('/admin/store-teacher/') }}">
          @else
          <form name="user_details" id="user_details" method="post" action="{{ url('/admin/update-teacher/' . ($teacher->id)) }}">
            @endif
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">First name</label>
              <input type="text" id="first_name" name="first_name" value="{{ $teacher->first_name ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Last name</label>
              <input type="text" id="last_name" name="last_name" value="{{ $teacher->last_name ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" id="email" name="email" value="{{ $teacher->email ?? ' ' }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone number</label>
              <input minlength="8" maxlength="13" id="phone" name="phone" value="{{ $teacher->phone ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Country</label>
              <input type="text" id="country" name="country" value="{{ $teacher->country ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">City</label>
              <input type="text" id="city" name="city" value="{{ $teacher->city ?? ' ' }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" id="username" name="username" value="{{ $teacher->username ?? ' ' }}" class="form-control" required>
            </div>
            @if($teacher)
            <div class="role_class">
              <label for="chooserole">Role</label>
              <select id="role" name="role" required>
                @foreach($roles as $role)
                <option value="{{$role['id']}}">{{$role['code']}}</option>
                @endforeach
              </select>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</body>

@endsection