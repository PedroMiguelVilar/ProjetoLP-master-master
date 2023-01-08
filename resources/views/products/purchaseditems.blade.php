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
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Shipped</th>
    </tr>
    
    @foreach ($products as $product)
    @if ($product->user->id == $id)  
    <tr>
        <td><a href="/showproducts/{{$product->product_id}}">{{$product->product->name}}</a></td>
        <td>{{$product->product->description}}</td>
        <td>{{$product->product->category}}</td>
        <td>{{$product->product->price}} €</td>
        @if($product->shipped == 0)
        <td>No</td>
        @elseif($product->shipped == 1 && $product->received == 'no')
        <td>
            Yes
            <form action="{{route('received', $product->id) }}" method="POST">
                @csrf   
                @method('PUT')
                    <button class="btn btn-primary">Received</button>
                    <input type = "hidden" name = "id" value = "{{$product->id}}">
                    <input type = "hidden" name = "received" value = yes>
            </form>
        </td>
        @elseif($product->shipped == 1 && $product->received == 'yes')
        <td>Product Received at {{$product->updated_at}}</td>

        @endif
    @endif
    </tr>
    
   
    @endforeach
</table>


@endsection
