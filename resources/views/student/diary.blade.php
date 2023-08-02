@extends('layouts.admin-dash-layout')
@section('content')
<head>
    <title>Student Diary</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            display: inline;
            margin-right: 10px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Table styles */
        .table-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background-color: #fff;
            margin-bottom: 20px;
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

        /* Content styles */
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
            <li class="active" ><a href='/'>Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <div class="table-container">
            <div class="table-header">Lecture</div>
            <div class="table-header">Homework</div>
            <div class="table-header">Absence</div>
            <div class="table-header">Score</div>

            @foreach ($lectures as $lecture)
                <div class="table-cell">{{ $lecture->name }}</div>
                <div class="table-cell">
                    @foreach ($lecture->homeworks as $homework)
                        {{ $homework->name }}
                        <br>
                    @endforeach
                </div>
                <div class="table-cell">
                    @foreach ($lecture->absences as $absence)
                        {{ $absence->date }}
                        <br>
                    @endforeach
                </div>
                <div class="table-cell">
                    @if ($lecture->scores->count() > 0)
                        {{ $lecture->scores->avg('grade') }}
                    @else
                        No scores available
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
@endsection
