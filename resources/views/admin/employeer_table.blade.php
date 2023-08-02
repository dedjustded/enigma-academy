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
        grid-template-columns: repeat(8, 1fr);
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

    /* Button container styles */
    .button-container {
        padding: 1px;
        border: 1px solid #ccc;
        text-align: center;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
        cursor: pointer;
    }

    .button:hover {
        background-color: #45a049;
    }

    /* Content styles */
    .content {
        padding: 20px;
    }
    header nav ul li a span {
        text-decoration: underline;
    }
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
  <div class="table-header">Username</div>
  <div class="table-header">Action</div>
  

  @foreach ($employeers as $employeer)
    <div class="table-cell">{{ $employeer->first_name }}</div>
    <div class="table-cell">{{ $employeer->last_name }}</div>
    <div class="table-cell">{{ $employeer->email }}</div>
    <div class="table-cell">{{ $employeer->phone }}</div>
    <div class="table-cell">{{ $employeer->country }}</div>
    <div class="table-cell">{{ $employeer->city }}</div>
    <div class="table-cell">{{ $employeer->username }}</div>

    
    <div class="button-container">
      <form action="/admin/add-employeer/ {{ $employeer->id }}" method="GET">
          @csrf
          <button type="submit">Edit</button>
      </form>
      <form action="/admin/employeer-delete/{{$employeer->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirmDelete('{{ $employeer->username }}')">Delete</button>
      </form>
    </div>
  @endforeach
</div>

<div class="button-add">
  <form action="/admin/add-employeer" method="GET">
      @csrf
      <button type="submit" class="button">Add new employeer</button>
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