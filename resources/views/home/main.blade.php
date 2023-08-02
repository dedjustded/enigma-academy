@extends('layouts.admin-dash-layout')
@section('content')

<body>
    <div class="container">
    <a href="/admin/training/create" class="btn btn-primary">Add new training</a>
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
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

@endsection