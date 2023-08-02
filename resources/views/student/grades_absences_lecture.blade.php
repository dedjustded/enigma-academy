@extends('layouts.admin-dash-layout')
@section('content')
<style>
    /* Добавете следния код след съществуващите стилове */

    label {
        font-weight: bold;
    }

    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 5px;
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
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Grades/Absences</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Grades/Absences
        </div>
        <div class="card-body">
            <div class="student_class">
                <h8>Student: <b>{{$student->first_name . ' ' . $student->last_name}}</b>, with username: <b>{{$student->username}}</b></h8> <br><br>
            </div>

            <div class="training_class">
                <label for="chooseLecture">Training: </label> <b>{{$training->course_name}}</b>
            </div>
            <div class="module_class">
                <label for="chooseLecture">Modules: </label> <b>{{$module->name}}</b>
            </div>

            <div class="lecture_class">
                <label for="chooseLecture">Lectures: </label>
                @if(!$lectures->isEmpty())
                <div class="dropdown">
                    <button class="dropbtn">Available lectures</button>
                    <div class="dropdown-content">
                        @foreach($lectures as $lecture)
                        <a href="/admin/grades-absences/{{$student->id}}/{{$training->id}}/{{$module->id}}/{{$lecture->id}}">{{$lecture['name']}}</a>
                        @endforeach
                    </div>
                </div>
                @else
                There are no lectures!
                @endif
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<style>
    .homeworks_class table {
        border-collapse: collapse;
        width: 100%;
    }

    .homeworks_class th,
    .homeworks_class td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .homeworks_class th {
        background-color: #f2f2f2;
    }

    .homeworks_class tr:hover {
        background-color: #f5f5f5;
    }
</style>
@endsection