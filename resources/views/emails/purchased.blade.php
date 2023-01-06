<?php

use App\Models\Cart;;

$carts = Cart::All();

use App\Http\Controllers\CartController;

$total=CartController::order();

?>

<!DOCTYPE html>
<html>
<head>
    <title>SellHighBuyLow</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <div hidden>{{$check = false}}</div>
    @foreach ($carts as $cart)
    @if(Auth::id() == $cart->user->id)
    <div hidden>{{$check = true}}</div>
    @for($i = 0; $i < $cart->quantity; $i++)
        <figure>  
         <label class="item">
            <figcaption>{{ $cart->product->name}}</figcaption>
            <span>{{ $cart->product->price}}€</span>
         </label>
        </figure>
        @endfor
    @endif
    @endforeach

    @if($check == true)
    <span>Total = {{$total}}</span>
    @endif
</body>
</html>