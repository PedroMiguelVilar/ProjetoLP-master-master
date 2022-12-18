<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->cart_quantity;
        $cart->save();
        return redirect()->back();
    }

    static function cartItem()
    {

        if (Auth::check()) {
            $userId = Auth::user()->id;

            $by = DB::table('cart')
                ->select('quantity')
                ->where('user_id', $userId)->sum('quantity');

            return $by;
        }
    }

    public function showCart()
    {

        $carts = Cart::all();

        return view('cart.showcartproducts', compact('carts'));
    }

    public function deletecartproducts(Cart $cart)
    {
        if($cart->quantity==1){
            $cart->delete();
        }else{
            $cart->quantity--;
            $cart->update();
        }
        return redirect('cart/show');
    }

    static function order()
    {
        $carts = Cart::all();
        $id = Auth::user()->id;
        $price = 0;

        foreach($carts as $cart){
            if($cart->user_id == $id){
                $price+=$cart->product->price*$cart->quantity;
            }
        }

        return $price;

    }

    static function deletecart(){

        $id = Auth::user()->id;
        $carts = Cart::all();

        foreach($carts as $cart){
            if($cart->user_id == $id){
                $cart->delete();
            }
        }
    }

}