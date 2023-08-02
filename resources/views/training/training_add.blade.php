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
                        Add/Edit training
                    </div>
                    <div class="card-body">
                        <div class="training_class">
                            <label for="training_name">Choose training for edit: </label>
                            @if(!$trainings->isEmpty())
                            <div class="dropdown">
                                <button class="dropbtn">Available trainings</button>
                                <div class="dropdown-content">
                                    @foreach($trainings as $training)
                                    <a href="/admin/training/create/{{$training['id']}}">{{$training['course_name']}}</a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <p>There are no trainings!</p>
                            @endif
                            <p><a href="/admin/training/edit/" class="btn btn-primary"> Create new training</a></p>

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

@endsection