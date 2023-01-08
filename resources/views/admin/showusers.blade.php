@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<style>input { color: black; }</style>

<table class="table table-bordered">
    <style>h5 {color: #ffffff;}th {color: #ffffff;}td {color: #ffffff;}</style>
    <tr>
        <th>User Name:</th>
        <th>User Id</th>
        <th>User role</th>
        <th>Banned</th>
        <th>Actions</th>

    </tr>
    @forelse ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->status}}</td>
        @if($user->role < 2)
        <td>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf   
            @method('PUT')
            @if($user->role == 1)
                <button class="btn btn-primary">Downgrade</button>
                <input type = "hidden" name = "id" value = "{{$user->role}}">
                <input type = "hidden" name = "role" value = 0>
            @endif
            @if($user->role == 0)
                <button class="btn btn-primary">Upgrade</button>
                <input type = "hidden" name = "id" value = "{{$user->role}}">
                <input type = "hidden" name = "role" value = 1>
            @endif
        </form>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf   
            @method('PUT')
            @if($user->status == 1)
                <button class="btn btn-danger">Unban</button>
                <input type = "hidden" name = "id" value = "{{$user->status}}">
                <input type = "hidden" name = "status" value = 0>
            @endif
            @if($user->status == 0)
                <button class="btn btn-danger">Ban</button>
                <input type = "hidden" name = "id" value = "{{$user->status}}">
                <input type = "hidden" name = "status" value = 1>
            @endif
        </form>

        
        </td>
        @endif
    </tr>
    @empty
    <h5 class="text-center">No users Found!</h5>
    @endforelse
</table>


{!!$users->links('pagination::bootstrap-5')!!}

@endsection
