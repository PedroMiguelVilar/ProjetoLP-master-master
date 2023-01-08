<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PurchasedItems;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    static function index()
    {
        $details = [
            'title' => 'Mail from SellHighBuyLow.com',
            'body' => 'Thank you for your purchase!'
        ];

        $user = User::all();
        

        foreach($user as $u){
            if($u->id == Auth::user()->id){
                $email = $u->email;
            }
        }
         
        \Mail::to($email)->send(new \App\Mail\DemoMail($details));

    }

    static function status(Request $request)
    {

        $products = PurchasedItems::all();
        
        foreach($products as $prod){
            if($request->id == $prod->id){
                $product_shipped = $prod->product->name;
            }
        }

        $details = [
            'title' => 'Mail from SellHighBuyLow.com',
            'body' => 'One of your orders has been shipped!',
            'product' => $product_shipped
        ];

        $purchased = PurchasedItems::all();

        foreach($purchased as $u){
            if($u->id == $request->id){ 
                $email = $u->user->email;
            }
        }
        

         
        \Mail::to($email)->send(new \App\Mail\StatusMail($details));

    }

}
