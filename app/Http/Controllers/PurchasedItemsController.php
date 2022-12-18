<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PurchasedItems;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PurchasedItemsController extends Controller
{
    static function store(){

        $carts = Cart::all();
        $id = Auth::user()->id;
        
        $purchased = new PurchasedItems;

        foreach($carts as $cart){
            if($cart->user_id == $id){
                for($i=0; $i < $cart->quantity; $i++){
                    $purchased->user_id = $cart->user_id;
                    $purchased->product_id = $cart->product_id;
                    $purchased->quantity = $cart->quantity;
                    $purchased->save(); 
                }
            }
        }

    }
}
