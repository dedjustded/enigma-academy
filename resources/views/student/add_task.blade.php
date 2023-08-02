@extends('layouts.admin-dash-layout')
@section('content')
<style>
    /* Добавете следния код след съществуващите стилове */

    label {
        font-weight: bold;
    }

    .button {
        margin-top: 10px;
    }

    .training_class,
    .module_class,
    .lecture_class,
    .schedule_class,
    .homework_class {
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }


    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    .add_lecture_div {
        padding-top: 50px;
    }
</style>

<!DOCTYPE html>
<html>

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
                        <form name="user_details" id="user_details" method="post" action="{{ url('/admin/homework/save-homework/' . $lecture_id )}}">
                            @csrf
                            <label for="exampleInputEmail1">Homework name: </label>
                            <input type="text" id="name" name="name"><br>
                            <label for="exampleInputEmail1">Homework descriprion: </label>
                            <p><textarea type="text" id="decription" name="description" rols="4" cols="50"  placeholder="Input the homework description here" class="add_description" required></textarea></p>
                            <input type="hidden" id="lecture_id" name="lecture_id" value="{{$lecture_id}}">
                            <input type="hidden" id="flag" name="flag" value='true'>
                            <input type="hidden" id="student_id" name="student_id" value="{{$student_id}}">
                            <button type="submit" class="btn btn-primary">Add/Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection