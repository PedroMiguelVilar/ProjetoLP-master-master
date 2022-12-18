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
        <th>Actions</th>

    </tr>
    @forelse ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->role}}</td>
        
        <td>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf   
            @method('PUT')
                <button class="btn btn-primary">Upgrade</button>
                <input input type="number" min="0" max="1" class="@error('name') is-invalid @enderror"name="role" value="{{$user->role}}" required autocomplete="name" autofocus>
        </form>
        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
 
    </tr>
    @empty
    <h5 class="text-center">No users Found!</h5>
    @endforelse
</table>


{!!$users->links('pagination::bootstrap-5')!!}

@endsection
