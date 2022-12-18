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
        <th>User Id</th>
        <th>User Name:</th>       
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
        
    </tr>
    @forelse ($products as $product)
    <tr>
        <td>{{$product->user->id}}</td>
        <td>{{$product->user->name}}</td>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}} €</td>
        <td>
        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @empty
    <h5 class="text-center">No products Found!</h5>
    @endforelse
</table>


{!!$products->links('pagination::bootstrap-5')!!}

@endsection
