@extends('layouts.admin-dash-layout')
@section('content')

<style>
    /* Table styles */
    .table-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
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
</style>
<div class="table-container">
    <div class="table-header">First Name</div>
    <div class="table-header">Last Name</div>
    <div class="table-header">Email</div>
    <div class="table-header">Username</div>
    <div class="table-header">Permissions</div>
    <div class="table-header">Actions</div>
    @foreach ($users as $user)
    <div class="table-cell">{{ $user->first_name }}</div>
    <div class="table-cell">{{ $user->last_name }}</div>
    <div class="table-cell">{{ $user->email }}</div>
    <div class="table-cell">{{ $user->username }}</div>
    <div class="table-cell">
        @if(!$user->training->isEmpty())
        @foreach($user->training as $training)
        <p>{{$training['course_name']}}</p>
        @endforeach
        @else
        <p>No permissions</p>
        @endif
    </div>
    <div class="button-container">
        <form action="/admin/permission/add-edit/{{ $user->id }}" method="GET">
            @csrf
            <button type="submit">Set permission</button>
        </form>
    </div>
    @endforeach
</div>
@endsection