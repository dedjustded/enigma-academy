@extends('layouts.admin-dash-layout')
@section('content')
<style>
    /* Global styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    /* Table styles */
    .table-container {
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        gap: 1px;
        background-color: #fff;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 10px;
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

    /* Button styles */
    .button-container {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .button-container button {
        padding: 5px 10px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        margin-right: 5px;
    }

    .button-container button:last-child {
        margin-right: 0;
    }

    .button-container button:hover {
        background-color: #45a049;
    }

    /* Add button styles */
    .button-add {
        padding: 10px;
    }

    .button-add button {
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }

    .button-add button:hover {
        background-color: #45a049;
    }


</style>
<div class="table-container">
  <div class="table-header">First Name</div>
  <div class="table-header">Last Name</div>
  <div class="table-header">Email</div>
  <div class="table-header">Phone</div>
  <div class="table-header">Country</div>
  <div class="table-header">City</div>
  <div class="table-header">Language</div>
  <div class="table-header">Username</div>
  <div class="table-header">Actions</div>

  @foreach ($students as $student)
    <div class="table-cell">{{ $student->first_name }}</div>
    <div class="table-cell">{{ $student->last_name }}</div>
    <div class="table-cell">{{ $student->email }}</div>
    <div class="table-cell">{{ $student->phone }}</div>
    <div class="table-cell">{{ $student->country }}</div>
    <div class="table-cell">{{ $student->city }}</div>
    <div class="table-cell">{{ $student->language }}</div>
    <div class="table-cell">{{ $student->username }}</div>
    
    <div class="button-container">
        @if(Auth::user()->role->code == "admin")
      <form action="/admin/add-student/ {{ $student->id }}" method="GET">
          @csrf
          <button type="submit">Edit</button>
      </form>
      <form action="/admin/student-delete/{{$student->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirmDelete('{{ $student->username }}')">Delete</button>
      </form>
      @endif
      <form action="/admin/grades-absences/{{$student->id}}" method="GET">
          @csrf
          <button type="submit">Grades/Absences</button>
      </form>
    </div>
  @endforeach
</div>

<div class="button-add">
  <form action="/admin/add-student" method="GET">
      @csrf
      <button type="submit">Add new student</button>
    </form>
</div>



<script>
    function confirmDelete(username) {
        if (confirm("Are you sure you want to delete this user? " + username)) {
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection