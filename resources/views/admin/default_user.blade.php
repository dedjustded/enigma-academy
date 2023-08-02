@extends('admin.users_page')
@section('content')
<div class="table-container">
  <div class="table-header">First Name</div>
  <div class="table-header">Last Name</div>
  <div class="table-header">Email</div>
  <div class="table-header">Phone</div>
  <div class="table-header">Country</div>
  <div class="table-header">City</div>
  <div class="table-header">Username</div>
  <div class="table-header">Action</div>
  

  @foreach ($teachers as $teacher)
    <div class="table-cell">{{ $teacher->first_name }}</div>
    <div class="table-cell">{{ $teacher->last_name }}</div>
    <div class="table-cell">{{ $teacher->email }}</div>
    <div class="table-cell">{{ $teacher->phone }}</div>
    <div class="table-cell">{{ $teacher->country }}</div>
    <div class="table-cell">{{ $teacher->city }}</div>
    <div class="table-cell">{{ $teacher->username }}</div>

    
    <div class="button-container">
      <form action="/admin/add-teacher/ {{ $teacher->id }}" method="GET">
          @csrf
          <button type="submit">Edit</button>
      </form>
      <form action="/admin/teacher-delete/{{$teacher->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirmDelete('{{ $teacher->username }}')">Delete</button>
      </form>
    </div>
  @endforeach
</div>

<div class="button-add">
  <form action="/admin/add-teacher" method="GET">
      @csrf
      <button type="submit">Add new user</button>
    </form>
</div>
@endsection