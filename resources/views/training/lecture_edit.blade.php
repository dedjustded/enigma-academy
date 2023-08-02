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
                        Add/Edit module
                    </div>
                    <div class="add_lecture_div">
                        <form name="user_details" id="user_details" method="post" action="{{ url('admin/lecture/save-lecture/'. $module->id.'/'. ($lecture->id ?? ''))}}">
                            @csrf
                            <label for="exampleInputEmail1">Lecture name: </label>
                            <p><input type="text" id="lecture_name" name="lecture_name" size="50" value="{{$lecture->name ?? ''}}" placeholder="Input the new lecture name here" class="add_lecture" required></p>
                            <p><textarea type="text" id="decription" name="description" rols="4" cols="50"  placeholder="Input the lecture description here" class="add_description" required>{{$lecture->description ?? ''}}</textarea></p>
                            <input type="hidden" id="module_id" name="module_id" value="{{$module->id }}">
                            <input type="hidden" id="lecture_id" name="lecture_id" value="{{$lecture->id ?? null }}">
                            <button type="submit" class="btn btn-primary">Add/Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection