@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <style>h5 {color: #ffffff;}th {color: #ffffff;}td {color: #ffffff;}</style>
    <tr>
        <th>Product Name</th>
        <th>Sold To</th>
        <th>Shipped</th>
    </tr>
    
    @foreach ($products as $product)
    @if ($product->product->user->id == $id)  
    <tr>
        <td><a href="/showproducts/{{$product->product->id}}">{{$product->product->name}}</a></td>
        <td>{{$product->user->name}}</td>
        <td>
            
            <form action="{{ route('shipped', $product->id) }}" method="POST">
            @csrf   
            @method('PUT')
            <input type="checkbox" id="shipped" value="true">
            <button type = "submit" class="btn btn-primary">{{$product->shipped}}</button>
            </form>
        </td>
    @endif
    </tr>
    @endforeach
</table>


@endsection
