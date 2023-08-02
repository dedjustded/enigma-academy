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
                        Add/Edit homework
                    </div>
                    <div class="add_lecture_div">
                        <form name="user_details" id="user_details" method="post" action="{{ url('/admin/homework/save-homework/' . $lecture->id . '/' . ($homework->id ?? ''))}}">
                            @csrf
                            <label for="exampleInputEmail1">Homework name: </label>
                            <input type="text" id="name" name="name" value="{{$homework->name ?? '' }}"><br>
                            <label for="exampleInputEmail1">Homework descriprion: </label>
                            <p><textarea type="text" id="decription" name="description" rols="4" cols="50"  placeholder="Input the homework description here" class="add_description" required>{{$homework->description ?? ''}}</textarea></p>
                            <input type="hidden" id="lecture_id" name="lecture_id" value="{{$lecture->id }}">
                            <input type="hidden" id="homework_id" name="homework_id" value="{{$homework->id ?? null }}">
                            <button type="submit" class="btn btn-primary">Add/Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection