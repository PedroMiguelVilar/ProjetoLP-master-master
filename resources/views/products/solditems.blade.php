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
        @if($product->shipped == 0)
        <td>
            <form action="{{route('shipped', $product->id) }}" method="POST">
                @csrf   
                @method('PUT')
                    <button class="btn btn-primary">Shipped</button>
                    <input type = "hidden" name = "id" value = "{{$product->id}}">
                    <input type = "hidden" name = "shipped" value = 1>
            </form>
        </td>
        @endif
    @endif
    </tr>
    @endforeach
</table>


@endsection