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
                    <div class="add_module_div">
                        <form name="user_details" id="user_details" method="post" action="{{ url('admin/module/save-module/')}}">
                            @csrf
                            <label for="exampleInputEmail1">Module name: </label>
                            <p><input type="text" id="module_name" name="module_name" size="50" value="{{$module->name ?? ''}}" placeholder="Input the new module name here" class="add_module" required></p>
                            <p><textarea type="text" id="decription" name="description" rols="4" cols="50"  placeholder="Input the module description here" class="add_description" required>{{$module->description ?? ''}}</textarea></p>
                            <input type="hidden" id="training_id" name="training_id" value="{{$training->id }}">
                            <input type="hidden" id="module_id" name="module_id" value="{{$module->id ?? null }}">
                            <button type="submit" class="btn btn-primary">Add/Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection