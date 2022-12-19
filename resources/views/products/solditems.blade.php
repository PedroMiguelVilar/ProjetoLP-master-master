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
        <td><a href="/showproducts/{{$product->product->product_id}}">{{$product->product->name}}</a></td>
        <td>{{$product->user->name}}</td>
        <td></td>
    @endif
    </tr>
    @endforeach
</table>


@endsection
