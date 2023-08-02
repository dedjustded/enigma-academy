@extends('show_trainings_by_permissions')
@section('content')


<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Activity</th>
            @foreach($modules as $module)
            <th>{{$module->name}}</th>
            @endforeach
            <th>Final score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activity as $student)
        <tr>
            @foreach ($student as $key=>$param)
            @if($key==0)
            @continue
            @endif
            <td><a href="/student_details/{{$student[0]}}"> {{$param}}</a></td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

@endsection