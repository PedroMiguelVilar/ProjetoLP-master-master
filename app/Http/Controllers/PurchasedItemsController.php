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


    public function index(){

        $id = Auth::id();
        $products = PurchasedItems::all();
    
        return view('products.purchaseditems', compact('products', 'id'));
    }

    static function store(){

        $carts = Cart::all();
        $id = Auth::user()->id;

        foreach($carts as $cart){
            $purchased = new PurchasedItems;
            if($cart->user_id == $id){
                $purchased->user_id = $cart->user_id;
                $purchased->product_id = $cart->product_id;
                $purchased->save();
            }
        }

    }
}
