@extends('layouts.admin-dash-layout')
@section('content')
<head>
    <title>Add training</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Add training
                    </div>
                    <div class="card-body">

                        <div class="training_class">
                            <label for="training_name">You are in training: {{$training->course_name}}</label>
                            <div class="schedule_class">
                                <h6>
                                    <bold>Schedule</bold>
                                </h6>
                                <h6>The course is active from: <b>{{$training->schedule_from}}</b> to <b>{{$training->schedule_to}}</b> </h6>
                                <div class="description_class">
                                    <h6><b>Training description:</b> {{$training->description}}</h6>
                                </div>
                                @csrf

                                <form action="/admin/training/delete/{{$training['id']}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href='/admin/training/edit/{{$training->id}}' class="btn btn-primary"> Edit training</a>
                                    <button type="submit" class="btn btn-primary" onclick="return confirmDelete('{{ $training->course_name }}')">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="module_class">
                            <label for="module_name">Module: </label>
                            @if(!$training->module->isEmpty())

                            <div class="dropdown">
                                <button class="dropbtn">Available trainings</button>
                                <div class="dropdown-content">
                                    @foreach($training->module as $module)
                                    <a href="/admin/training/create/{{$training['id']}}/{{$module['id']}}">{{$module['name']}}</a>

                                    @endforeach
                                </div>
                            </div>
                            @else
                            <p>There are no modules!</p>
                            @endif
                            <div class="create_new">
                                <p><a href="/admin/module/edit/{{$training->id}}" class="btn btn-primary"> Create new module</a></p>
                            </div>
                        </div>
                        <div class="submit_class">
                        <a href="/admin/trainings" class="btn btn-primary">Back to trainings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function confirmDelete(username) {
        if (confirm("Are you sure you want to delete: " + username)) {
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection