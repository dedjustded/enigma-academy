@extends('layouts.admin-dash-layout')
@section('content')

<head>
    <title>user details</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .module_class {
            padding-top: 50px;
        }

        .training_time {
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .schedule_class {
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        User name: {{ $user->first_name . " " . $user->last_name }}
                    </div>
                    <div class="card-body">
                        <div class="user_description">
                            <label for="user_description"><b>Username: </b></label>
                            <h8>{{$user->username}}</h8>
                            <br>
                            <label for="user_description"><b>User email: </b></label>
                            <h8>{{$user->email}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Phone number: </label>
                            <h8>{{$user->phonel}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Country: </label>
                            <h8>{{$user->country}}</h8>
                            <br>
                            <label for="exampleInputEmail1">City: </label>
                            <h8>{{$user->city}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Languages: </label>
                            <h8>{{$user->language}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Github Repository: </label>
                            <h8>{{$user->repository}}</h8>
                            <br>
                            <label for="exampleInputEmail1">LinkedIn: </label>
                            <h8>{{$user->link}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Hobbies: </label>
                            <h8>{{$user->hoby}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Skills: </label>
                            <h8>{{$user->skils}}</h8>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection