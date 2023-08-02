@extends('layouts.admin-dash-layout')
@section('content')
<style>
    /* Добавете следния код след съществуващите стилове */

    label {
        font-weight: bold;
    }

    .absence_class input[type="radio"] {
        margin-left: 20px;
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
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Grades/Absences</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Grades/Absences
            </div>
            <div class="card-body">
                <div class="student_class">
                    <h8>Student: <b>{{$student->first_name . ' ' . $student->last_name}}</b>, with username: <b>{{$student->username}}</b></h8> <br><br>
                </div>
                <div class="training_class">
                    <label for="chooseLecture">Training: </label> <b>{{$training->course_name}}</b>
                </div>
                <div class="module_class">
                    <label for="chooseLecture">Modules: </label> <b>{{$module->name}}</b>
                </div>

                <div class="lecture_class">
                    <label for="chooseLecture">Lecture: </label> <b>{{$lecture->name}}</b>
                </div>


                <form name="user_details" id="user_details" method="post" action="{{ url('/admin/grades/submit')}}">
                    @csrf
                    <div class="grades_absences_class">
                        <div class="absence_class">
                            <h4>Absence</h4>
                            @if($absence)
                            <th><input type="radio" name="absence" value="late" {{ $absence->absence_name == 'late' ? 'checked' : '' }}> Was late
                                <input type="radio" name="absence" value="escaped" {{ $absence->absence_name == 'escaped' ? 'checked' : '' }}> Escaped
                                <input type="radio" name="absence" value="didNotCome" {{ $absence->absence_name == 'didNotCome' ? 'checked' : '' }}> Did not come
                                <input type="radio" name="absence" value="disregarded" style="padding: 60px" {{ $absence->absence_name == 'disregarded' ? 'checked' : '' }}> Disregarded
                                @else
                            <th><input type="radio" name="absence" value="late"> Was late
                                <input type="radio" name="absence" value="escaped"> Escaped
                                <input type="radio" name="absence" value="didNotCome"> Did not come
                                <input type="radio" name="absence" value="disregarded"> Disregarded
                                @endif
                        </div>

                        <div class="absence_note">
                            <label for="note" style="display: block"> Absence note / reason</label>
                            <textarea name="note" id="note" rows="4" cols="50">{{$absence->note ?? null}}</textarea>
                            <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                        </div>
                        <div class="homeworks_class">
                            <h4>Homework</h4>
                            <table>
                                <thead>
                                    <tr>

                                        <th>Task
                            
                                            <a href="/admin/grades/addTask/{{$student->id}}/{{$lecture->id}}" style="padding-left: 10px;">Добави задача</a>
                                        </th>
                                    
                                        <th>Status</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($homeworks)
                                        @foreach($homeworks as $homework)
                                        <td>{{$homework->name}}</td>
                                        <td>
                                            @php
                                            $status = $grades->where('homework_id', $homework->id)->first;
                                            @endphp

                                            <input type="checkbox" name="has_homework{{$homework->id}}" value=1 {{ ($status && $status->has_homework == true) ? 'checked' : '' }}> Has homework

                                            <input type="checkbox" name="not_works{{$homework->id}}" value=1 {{ ($status && $status->not_works == true) ? 'checked' : '' }}> Not works

                                            <input type="checkbox" name="on_time{{$homework->id}}" value=1 {{ ($status && $status->on_time == true) ? 'checked' : '' }}> On time

                                        </td>
                                        <td>
                                            <input type="text" id="grade" name="grade{{$homework->id}}" step="0.01" min="2" max="6" value="{{ $status->grade->grade ?? '' }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
</body>


</html>

<style>
    .homeworks_class table {
        border-collapse: collapse;
        width: 100%;
    }

    .homeworks_class th,
    .homeworks_class td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .homeworks_class th {
        background-color: #f2f2f2;
    }

    .homeworks_class tr:hover {
        background-color: #f5f5f5;
    }

    
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var input = document.getElementById("grade");

        input.addEventListener("input", function() {
            var value = parseInt(this.value);

            if (isNaN(value) || value < 2 || value > 6) {
                this.value = "";
            }
        });
    });
</script>

@endsection