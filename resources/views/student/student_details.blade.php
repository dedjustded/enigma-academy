@extends('layouts.admin-dash-layout')
@section('content')

<head>
    <title>Student details</title>
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
                        Student name: {{ $student->first_name . " " . $student->last_name }}
                    </div>
                    <div class="card-body">
                        <div class="student_description">
                            <label for="student_description"><b>Student username: </b></label>
                            <h8>{{$student->username}}</h8>
                            <br>
                            <label for="student_description"><b>Student email: </b></label>
                            <h8>{{$student->email}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Phone number: </label>
                            <h8>{{$student->phonel}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Country: </label>
                            <h8>{{$student->country}}</h8>
                            <br>
                            <label for="exampleInputEmail1">City: </label>
                            <h8>{{$student->city}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Language: </label>
                            <h8>{{$student->language}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Github Repository: </label>
                            <h8>{{$student->repository}}</h8>
                            <br>
                            <label for="exampleInputEmail1">LinkedIn: </label>
                            <h8>{{$student->link}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Hobbies: </label>
                            <h8>{{$student->hoby}}</h8>
                            <br>
                            <label for="exampleInputEmail1">Skills: </label>
                            <h8>{{$student->skils}}</h8>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection