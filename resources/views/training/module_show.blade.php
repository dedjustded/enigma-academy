@extends('layouts.admin-dash-layout')
@section('content')

<head>
    <title>{{ $module->name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .modules_class {
            padding-top: 50px;
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
                <div class="card-body">
                    <div class="card-header text-center font-weight-bold">
                        Module name: {{ $module->name }}
                    </div>
                        <div class="module_description">
                            <label for="module_description"><b>Module description:</b></label>
                            <br><h8>{{$module->description}}</h8>
                        </div>

                        <div class="modules_class">
                        @if (!$module->lecture->isEmpty())
                            <label for="modules"><b>This module has these lectures:</b></label>
                            <ul>
                                @foreach ($module->lecture as $lecture)
                                    <li>
                                        <h8>{{$lecture->name}}</h8>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection