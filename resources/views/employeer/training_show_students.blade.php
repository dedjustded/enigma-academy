@extends('training.training_show')
@section('content')

<div class="students_class">
<a href="showStudentsByTraining/{{$training->id}}" class="btn btn-primary">Show students from this training</a>   

</div>

@endsection