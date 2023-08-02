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

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    /* Table styles */
    .table-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1px;
        background-color: #fff;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 10px;
    }

    .table-header {
        background-color: #f2f2f2;
        padding: 10px;
        font-weight: bold;
        text-align: center;
    }

    .table-cell {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    /* Button styles */
    .button-container {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .button-container button {
        padding: 5px 10px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        margin-right: 5px;
    }

    .button-container button:last-child {
        margin-right: 0;
    }

    .button-container button:hover {
        background-color: #45a049;
    }

    /* Add button styles */
    .button-add {
        padding: 10px;
    }

    .button-add button {
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }

    .button-add button:hover {
        background-color: #45a049;
    }


    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (!$trainings->isEmpty())
                @foreach ($trainings as $training)
                <div class="card">
                    <div class="card-body">
                        <a href="/training/{{$training->id}}">
                            <h2>{{$training->course_name}}</h2>
                        </a>
                        <p>{{$training->description}}</p>
                        <p><strong>Training period:</strong> {{$training->schedule_from}} to {{$training->schedule_to}}</p>
                        @if(!$training->module->isEmpty())
                        <p><strong>Modules:</strong></p>
                        <ul>
                            @foreach ($training->module as $module)
                            <li>
                                <div class="module-name">
                                    <a href="/module/{{$module->id}}">{{$module->name}}</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <a href="studentsPerformance/{{$training->id}}" class="btn btn-primary">See students performance</a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

@endsection