<!DOCTYPE html>
<html>

<head>
    <title>{{ $training->course_name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .module_class {
            padding-top: 50px;
        }

        .training_time {
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .schedule_class {
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Training name: {{ $training->course_name }}
                    </div>
                    <div class="card-body">
                        <div class="training_description">
                            <label for="training_description"><b>Training description:</b></label>
                            <br>
                            <h8>{{$training->description}}</h8>
                        </div>

                        <div class="training_time">
                            <h8>Training starts on {{$training->schedule_from}} and ends on {{$training->schedule_to}}</h8>
                        </div>
                        <div class="modules_class">
                            @if (!$training->module->isEmpty())
                            <label for="modules"><b>This training has these modules:</b></label>
                            <ul>
                                @foreach ($training->module as $module)
                                <li>
                                    <a href="/module/{{$module->id}}">{{$module->name}}</a>
                                    @if (!$module->lecture->isEmpty())
                                    <ul>
                                        @foreach ($module->lecture as $lecture)
                                        <li>
                                            <h8>{{$lecture->name}}</h8>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>