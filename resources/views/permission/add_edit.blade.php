@extends('layouts.admin-dash-layout')
@section('content')

<head>
    <title>{{ $user->username }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .card-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .info-label {
            font-weight: bold;
        }

        .course-permissions {
            margin-top: 20px;
        }

        .course-permissions ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .course-permissions ul li {
            margin-bottom: 5px;
        }

        .course-permissions ul li a {
            text-decoration: none;
            color: #333;
        }

        .delete-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        User Details: {{ $user->username }}
                    </div>
                    <div class="card-body">
                        <div class="user-info">
                            <label class="info-label">User's name:</label>
                            <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                            <br>
                            <label class="info-label">User's email:</label>
                            <span>{{ $user->email }}</span>
                        </div>

                        <div class="course-permissions">
                            <label class="info-label">Course permissions:</label>
                            @if(!$user->training->isEmpty())
                            <ul>
                                @foreach($user->training as $training)
                                <li>
                                    <a href="/training/{{$training->id}}">{{ $training['course_name'] }}</a>
                                    <form action="/admin/permission/delete/{{$user->id}}/{{ $training->id }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p>There are no permissions</p>
                            @endif
                        </div>

                        <div class="add-permission">
                            <button class="add-button">Add new permission</button>
                            <ul class="course-list" style="display: none;">
                                @foreach($new_trainings as $training)
                                <li><a href="/admin/permission/{{$user['id']}}/{{$training['id']}}">{{$training['course_name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addButton = document.querySelector('.add-button');
        var courseList = document.querySelector('.course-list');

        addButton.addEventListener('click', function() {
            if (courseList.style.display === 'none') {
                courseList.style.display = 'block';
            } else {
                courseList.style.display = 'none';
            }
        });
    });
</script>
@endsection