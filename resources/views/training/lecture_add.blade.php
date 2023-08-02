@extends('layouts.admin-dash-layout')
@section('content')
<head>
    <title>Add training</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                        
                            @csrf
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
                                </div>
                            </div>
                            <div class="module_class">
                                <label for="module_name">Module name: {{$module->name}}</label>
                                <div class="description_class">
                                    <h6><b>Module description:</b> {{$module->description}}</h6>

                                    <form action="/admin/module/delete/{{$module['id']}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href='/admin/module/edit/{{$training->id}}/{{$module->id}}' class="btn btn-primary">Edit module</a>
                                        <button type="submit" class="btn btn-primary" onclick="return confirmDelete('{{ $module->name }}')">Delete</button>
                                    </form>
                                </div>
                            </div>
                    

                        <div class="lecture_class">
                            <label for="lecture_name">Lecture: </label>
                            @if(!$module->lecture->isEmpty())

                            <div class="dropdown">
                                <button class="dropbtn">Available lectures</button>
                                <div class="dropdown-content">
                                    @foreach($module->lecture as $lecture)
                                    <a href="/admin/training/create/{{$training['id']}}/{{$module['id']}}/{{$lecture['id']}}">{{$lecture['name']}}</a>

                                    @endforeach
                                </div>
                            </div>
                            @else
                            <p>There are no lectures!</p>
                            @endif
                            <div class="create_new">
                                <p><a href="/admin/lecture/edit/{{$module->id}}" class="btn btn-primary"> Create new lecture</a></p>
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