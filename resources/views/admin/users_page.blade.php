@extends('layouts.admin-dash-layout')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    .table-container {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 1px;
        background-color: #fff;
        margin-top: 20px;
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

    .button-container {
        padding: 1px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .content {
        padding: 20px;
    }

</style>
@if(!$users->isEmpty())

<div class="content">
<h3>Default users</h3>
    <div class="table-container">
        <div class="table-header">First Name</div>
        <div class="table-header">Last Name</div>
        <div class="table-header">Email</div>
        <div class="table-header">Phone</div>
        <div class="table-header">Country</div>
        <div class="table-header">City</div>
        <div class="table-header">Username</div>
        <div class="table-header">Action</div>
        @foreach ($users as $user)
        <div class="table-cell">{{ $user->first_name }}</div>
        <div class="table-cell">{{ $user->last_name }}</div>
        <div class="table-cell">{{ $user->email }}</div>
        <div class="table-cell">{{ $user->phone }}</div>
        <div class="table-cell">{{ $user->country }}</div>
        <div class="table-cell">{{ $user->city }}</div>
        <div class="table-cell">{{ $user->username }}</div>

        <div class="button-container">
            <form action="/admin/add-user/{{ $user->id }}" method="GET">
                @csrf
                <button type="submit">Edit</button>
            </form>
            <form action="/admin/user-delete/{{$user->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirmDelete('{{ $user->username }}')">Delete</button>
            </form>
        </div>
        @endforeach
    </div>

</div>
@endif
<footer>
</footer>
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