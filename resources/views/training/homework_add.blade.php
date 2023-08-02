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
                        <form name="training_add" id="training_add" method="post" action="{{ url('/admin/training/create/' . $training['id']) }}">
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
                                </div>
                            </div>
                        </form>

                        <div class="lecture_class">
                            <label for="lecture_name">Lectures: {{$lecture->name}}</label>
                            <div class="description_class">
                                <h6><b>Lecture description:</b> {{$lecture->description}}</h6>

                                <form action="/admin/lecture/delete/{{$lecture['id']}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/lecture/edit/{{$lecture->module_id}}/{{$lecture->id}}" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-primary" onclick="return confirmDelete('{{ $lecture->name }}')">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="lecture_class">
                            <label for="homework_name">Homeworks: </label>
                            @if(!$homework->isEmpty())

                            @foreach($lecture->homework as $homework)
                            <div class="task_description">
                                <label for="homework_name">Homework: {{$homework->name}}</label>
                                <p>{{$homework['description']}}</p>

                                <form action="/admin/homework/delete/{{$homework['id']}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/homework/edit/{{$lecture['id']}}/{{$homework['id']}}" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-primary" onclick="return confirmDelete('{{ $homework->description }}')">Delete</button>
                                </form>

                            </div>
                            @endforeach

                            @else
                            <p>There are no homeworks!</p>
                            @endif
                            <div class="create_new">
                                <p><a href="/admin/homework/edit/{{$lecture['id']}}" class="btn btn-primary"> Create new homework</a></p>
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

</html>

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