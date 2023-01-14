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

    public static function store(){

        $carts = Cart::all();
        $id = Auth::user()->id;

        foreach($carts as $cart){
            if($cart->user_id == $id){
                for($i=0; $i < $cart->quantity; $i++){
                $purchased = new PurchasedItems;
                $purchased->user_id = $cart->user_id;
                $purchased->product_id = $cart->product_id;
                $purchased->save();
            }
            }
        }

    }
 
    public function received(Request $request)
    {
        $purchasedItems = PurchasedItems::all();
        foreach($purchasedItems as $purchasedItem){
            if($purchasedItem->id == $request->id){
                $purchasedItem->received=$request->received;
                $purchasedItem->update();
            }
        }
        return redirect('/purchaseditems');
    }

}
