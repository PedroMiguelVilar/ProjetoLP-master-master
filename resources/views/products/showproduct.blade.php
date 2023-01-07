<?php
use App\Http\Controllers\WishlistController;

$wishlist=WishlistController::WishlistStatus();
?>

<!DOCTYPE html>
<!-- saved from url=(0022)http://127.0.0.1:8000/ -->
@extends('layouts.app')
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <style>
        body {background: #212534;}*{ box-sizing:border-box; -moz-box-sizing:border-box; } #wrap{ width: 90%; max-width: 1100px; margin: 50px auto; } .columns_2 figure{ width:49%; margin-right:1%; } .columns_2 figure:nth-child(2){ margin-right: 0; } .columns_3 figure{ width:32%; margin-right:1%; } .columns_3 figure:nth-child(3){ margin-right: 0; } .columns_4 figure{ width:24%; margin-right:1%; } .columns_4 figure:nth-child(4){ margin-right: 0; } .columns_5 figure{ width:19%; margin-right:1%; } .columns_5 figure:nth-child(5){ margin-right: 0; } #columns figure:hover{ -webkit-transform: scale(1.1); -moz-transform:scale(1.1); transform: scale(1.1); } #columns:hover figure:not(:hover) { opacity: 0.4; } div#columns figure { display: inline-block; background: #FEFEFE; border: 2px solid #FAFAFA; box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4); margin: 0 0px 15px; -webkit-column-break-inside: avoid; -moz-column-break-inside: avoid; column-break-inside: avoid; padding: 15px; padding-bottom: 5px; background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9); opacity: 1; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease; } div#columns figure img { width: 100%; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 5px; } div#columns figure figcaption { font-size: .9rem; color: #444; line-height: 1.5; height:60px; font-weight:600; text-overflow:ellipsis; } a.button{ padding:10px; background:salmon; margin:10px; display:block; text-align:center; color:#fff; transition:all 1s linear; text-decoration:none; text-shadow:1px 1px 3px rgba(0,0,0,0.3); border-radius:3px; border-bottom:3px solid #ff6536; box-shadow:1px 1px 3px rgba(0,0,0,0.3); } a.button:hover{ background:#ff6536; border-bottom:3px solid salmon; color:#f1f2f3; } @media screen and (max-width: 960px) { #columns figure { width: 24%; } } @media screen and (max-width: 767px) { #columns figure { width:32%;} } @media screen and (max-width: 600px) { #columns figure { width: 49%;} } @media screen and (max-width: 500px) { #columns figure { width: 100%;} }
        .carousel-fix{ width: 90%; padding: 20px; margin: 100px auto; display: inline; felx-direction: row; justify-content: center; } .box{ height: 200px; width: 227px; margin: 0 10px; box-shadow: 0 0 20px 2px rgba(0,0,0,-1); transition: 1s; } .box img{ display: block; width: 100%; border-radius: 5px; } .box:hover{ transform: scale(1.3); z-index: 2; }
    </style>
    
</head>
<style>* { box-sizing: border-box; } .details-card { width: 80%; margin: auto; } .description-container { position: relative; /* height: 900px; */ } .main-description1 { position: absolute; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%); } .main-description h3 { font-size: 2rem; } .add-inputs, .add-inputs input { float: left; margin-right: 10px; margin-bottom: 2px; } .add-inputs button { border-radius: 0; } .add-inputs input { height: 48px; width: 65px; border-radius: 0; } .product-title { font-size: 1.1rem; font-weight: bold; } .product-price { font-size: 1.8rem; } .social-list { padding: 0; list-style: none; } .social-list li { float: left; padding: 6px 8px; margin-right: 12px; } .social-list li a { color: black; font-size: 2rem; } .social-list li a i { font-size: 2rem; }</style>
@section('content')
@if($product->hide == 'no')
<div class="container my-5">

    <div class="card details-card p-0">
        <div class="row">
            <div hidden>{{$j=0}}</div>
            @foreach($images as $image2)
            @if($product->id == $image2->product_id)
                <div hidden>{{$image = $image2}}</div>
                <div hidden>{{$j=1}}</div>
            @endif
            @endforeach
            @if($j==1)
            <div class="col-md-6 col-sm-12">
                <img class="img-fluid details-img" src="/images/{{$image->image}}" alt="">
            </div>
            @else
            <div class="col-md-6 col-sm-12">
                <img class="img-fluid details-img" src="{{$product->product_url}}" alt="">
            </div>
            @endif
            <div class="col-md-6 col-sm-12 description-container p-5">
                <div class="main-description">
                    <p class="product-category mb-0">{{$product->category}}</p>
                    <h3>{{$product->name}}</h3>
                    <hr>
                    <p class="product-price">{{$product->price}}€</p>
                    @if($product->quantity !=0)
                        <form class="add-inputs" action = "/cart/add" method="POST">
                            @csrf
                            <input name="product_id" type="hidden" value="{{$product->id}}">
                            <input type="number" class="form-control" id="cart_quantity" name="cart_quantity" value="1" min="1" max={{$product->quantity}}>
                            <button name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Add to cart</button>
                        </form>
                        @else
                        <a name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Without Stock</a>
                        @endif

                        @Auth
                        <div hidden>{{$i=1}}</div>
                    @foreach($wishlist as $item) 
                    @if($item->user_id == Auth::user()->id && $item->product_id == $product->id)
                        <a name="add_to_wishlist" type="submit" class="btn btn-primary btn-lg">Already Added</a>
                        <div hidden>{{$i=0}}</div>
                    @endif
                    @endforeach

                    @if($i == 1)
                        <form class="add-inputs" action = "/wishlist/add" method="POST">
                            @csrf
                            <input name="product_id" type="hidden" value="{{$product->id}}">
                            <input type="hidden" class="form-control" id="status" name="status" value="1">
                            <button name="add_to_wishlist" type="submit" class="btn btn-primary btn-lg">Add to Wishlist</button>
                        </form>
                    @endif
                    @endAuth

                    @guest
                    <form class="add-inputs" action = "/wishlist/add" method="POST">
                        @csrf
                        <input name="product_id" type="hidden" value="{{$product->id}}">
                        <input type="hidden" class="form-control" id="status" name="status" value="1">
                        <button name="add_to_wishlist" type="submit" class="btn btn-primary btn-lg">Add to Wishlist</button>
                    </form>
                    @endguest


                    <div style="clear:both"></div>
                    <hr>
                    <p class="product-title mt-4 mb-1">About this product</p>
                    <p class="product-description mb-4">
                        {{$product->description}}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="carousel-fix">
            @foreach($images as $image)
            @if($product->id == $image->product_id)
                <div class="row">
                    <div class="col-md-3">
                    <div class="box">
                        <img src="/images/{{$image->image}}" alt="">
                    </div>
                    </div>
                </div>
            @endif
            @endforeach
            </div>
        </div>
        <!-- End row -->
    </div>

@endif

@endsection