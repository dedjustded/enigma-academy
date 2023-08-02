@extends('layouts.admin-dash-layout')
@section('content')

<head>
    <title>Add/Edit training</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Add/Edit training
                    </div>
                    <div class="add_training_div">
                        <form name="user_details" id="user_details" method="post" action="{{ url('admin/training/save-training/') }}">
                            @csrf
                            <label for="exampleInputEmail1">Training name: </label>
                            <p><input type="text" id="training_name" name="training_name" size="50" value="{{$training->course_name ?? ''}}" placeholder="Input the new training name here" class="add_training"  required></p>
                            <p><textarea type="text" id="decription" name="description" rols="4" cols="50"  placeholder="Input the training description here" class="add_description" required>{{$training['description'] ?? ''}}</textarea></p>
                            <input type="hidden" id="training_id" name="training_id" value="{{$training->id ?? null}}">

                            <div class="schedule_class">
                                <h6>
                                    <bold>Schedule</bold>
                                </h6>
                                <h6>From: </h6>
                                <input type="date" id="schedule_from" name="schedule_from" class="form-control" value="{{$training['schedule_from'] ?? ''}}" required>
                                <h6>to: </h6>
                                <input type="date" id="schedule_to" name="schedule_to" class="form-control" value="{{$training['schedule_to'] ?? ''}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add/Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection