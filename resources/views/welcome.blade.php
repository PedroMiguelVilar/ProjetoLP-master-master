<!DOCTYPE html>
<!-- saved from url=(0022)http://127.0.0.1:8000/ -->
@extends('layouts.app')
<html lang="en">
<script src="chrome-extension://mjnbclmflcpookeapghfhapeffmpodij/injected_content.js"></script>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <style>
        body {background: #212534;}*{ box-sizing:border-box; -moz-box-sizing:border-box; } #wrap{ width: 90%; max-width: 1100px; margin: 50px auto; } .columns_2 figure{ width:49%; margin-right:1%; } .columns_2 figure:nth-child(2){ margin-right: 0; } .columns_3 figure{ width:32%; margin-right:1%; } .columns_3 figure:nth-child(3){ margin-right: 0; } .columns_4 figure{ width:24%; margin-right:1%; } .columns_4 figure:nth-child(4){ margin-right: 0; } .columns_5 figure{ width:19%; margin-right:1%; } .columns_5 figure:nth-child(5){ margin-right: 0; } #columns figure:hover{ -webkit-transform: scale(1.1); -moz-transform:scale(1.1); transform: scale(1.1); } #columns:hover figure:not(:hover) { opacity: 0.4; } div#columns figure { display: inline-block; background: #FEFEFE; border: 2px solid #FAFAFA; box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4); margin: 0 0px 15px; -webkit-column-break-inside: avoid; -moz-column-break-inside: avoid; column-break-inside: avoid; padding: 15px; padding-bottom: 5px; background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9); opacity: 1; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease; } div#columns figure img { width: 100%; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 5px; } div#columns figure figcaption { font-size: .9rem; color: #444; line-height: 1.5; height:60px; font-weight:600; text-overflow:ellipsis; } a.button{ padding:10px; background:salmon; margin:10px; display:block; text-align:center; color:#fff; transition:all 1s linear; text-decoration:none; text-shadow:1px 1px 3px rgba(0,0,0,0.3); border-radius:3px; border-bottom:3px solid #ff6536; box-shadow:1px 1px 3px rgba(0,0,0,0.3); } a.button:hover{ background:#ff6536; border-bottom:3px solid salmon; color:#f1f2f3; } @media screen and (max-width: 960px) { #columns figure { width: 24%; } } @media screen and (max-width: 767px) { #columns figure { width:32%;} } @media screen and (max-width: 600px) { #columns figure { width: 49%;} } @media screen and (max-width: 500px) { #columns figure { width: 100%;} }
    </style>

</head>
<style>.slider { width: 100%; } .slider input { display: none; } .testimonials { display: flex; align-items: center; justify-content: center; position: relative; min-height: 350px; perspective: 1000px; overflow: hidden; } .testimonials .item { width: 450px; padding: 30px; border-radius: 5px; background-color: #0A0220; position: absolute; top: 0; box-sizing: border-box; text-align: center; transition: transform 0.4s; box-shadow: 0 0 10px rgba(0,0,0,0.3); user-select: none; cursor: pointer; } .testimonials .item img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 13px solid #3B344D; } .testimonials .item p { color: #ddd; } .testimonials .item h2 { font-size: 14px; } .dots { display: flex; justify-content: center; align-items: center; } .dots label { height: 5px; width: 5px; border-radius: 50%; cursor: pointer; background-color: #413B52; margin: 7px; transition-duration: 0.2s; } #t-1:checked ~ .dots label[for="t-1"], #t-2:checked ~ .dots label[for="t-2"], #t-3:checked ~ .dots label[for="t-3"], #t-4:checked ~ .dots label[for="t-4"], #t-5:checked ~ .dots label[for="t-5"] { transform: scale(2); background-color: #fff; } #t-1:checked ~ .dots label[for="t-2"], #t-2:checked ~ .dots label[for="t-1"], #t-2:checked ~ .dots label[for="t-3"], #t-3:checked ~ .dots label[for="t-2"], #t-3:checked ~ .dots label[for="t-4"], #t-4:checked ~ .dots label[for="t-3"], #t-4:checked ~ .dots label[for="t-5"], #t-5:checked ~ .dots label[for="t-4"] { transform: scale(1.5); } #t-1:checked ~ .testimonials label[for="t-3"], #t-2:checked ~ .testimonials label[for="t-4"], #t-3:checked ~ .testimonials label[for="t-5"], #t-4:checked ~ .testimonials label[for="t-1"], #t-5:checked ~ .testimonials label[for="t-2"] { transform: translate3d(600px, 0, -180px) rotateY(-25deg); z-index: 2; } #t-1:checked ~ .testimonials label[for="t-2"], #t-2:checked ~ .testimonials label[for="t-3"], #t-3:checked ~ .testimonials label[for="t-4"], #t-4:checked ~ .testimonials label[for="t-5"], #t-5:checked ~ .testimonials label[for="t-1"] { transform: translate3d(300px, 0, -90px) rotateY(-15deg); z-index: 3; } #t-2:checked ~ .testimonials label[for="t-1"], #t-3:checked ~ .testimonials label[for="t-2"], #t-4:checked ~ .testimonials label[for="t-3"], #t-5:checked ~ .testimonials label[for="t-4"], #t-1:checked ~ .testimonials label[for="t-5"] { transform: translate3d(-300px, 0, -90px) rotateY(15deg); z-index: 3; } #t-3:checked ~ .testimonials label[for="t-1"], #t-4:checked ~ .testimonials label[for="t-2"], #t-5:checked ~ .testimonials label[for="t-3"], #t-2:checked ~ .testimonials label[for="t-5"], #t-1:checked ~ .testimonials label[for="t-4"] { transform: translate3d(-600px, 0, -180px) rotateY(25deg); } #t-1:checked ~ .testimonials label[for="t-1"], #t-2:checked ~ .testimonials label[for="t-2"], #t-3:checked ~ .testimonials label[for="t-3"], #t-4:checked ~ .testimonials label[for="t-4"], #t-5:checked ~ .testimonials label[for="t-4"], #t-5:checked ~ .testimonials label[for="t-5"] { z-index: 4; }</style>

@section('content')
    <div class="slider">
        <input type="radio" name="testimonial" id="t-1">
        <input type="radio" name="testimonial" id="t-2">
        <input type="radio" name="testimonial" id="t-3" checked>
        <input type="radio" name="testimonial" id="t-4">
        <input type="radio" name="testimonial" id="t-5">
        <div class="testimonials">
            {{$i=1}}
            @foreach ($products_carousel as $item)
            @if($item->hide == 'no')
                <label class="item" for="t-{{$i}}">
                    <img src="{{$item['product_url']}}" alt="picture">
                    <h3>{{ $item['name'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                    <a class="button" href="/showproducts/{{$item->id}}">Buy Now!</a>
                </label>
                {{$i++}}
            @if($i>5){
                {{$i=1}}
            }@endif
            @endif
            @endforeach
        </div>
    </div>

    <div class="dots">
        <label for="t-1"></label>
        <label for="t-2"></label>
        <label for="t-3"></label>
        <label for="t-4"></label>
        <label for="t-5"></label>
    </div>
    </div>


    <div id="wrap">
        <div id="columns" class="columns_4">  
        @foreach ($products as $item)
        @if($item->hide == 'no')
        <figure>  
             <label class="item" for="t-{{$item['id']}}">
                <img src="{{$item['product_url']}}" alt="picture">
                <figcaption>{{ $item['name'] }}</figcaption>
                <span>{{ $item['price'] }}€</span>
                <a class="button" href="/showproducts/{{$item->id}}">Buy Now!</a>
             </label>
            </figure>
        @endif
        @endforeach
    </div>


{!!$products->links('pagination::bootstrap-5')!!}
@endsection
