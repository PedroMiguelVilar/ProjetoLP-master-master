<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchasedItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoldItemsController extends Controller
{
    public function index(){

        $products = PurchasedItems::all();
        $id = Auth::id();

        return view('products.solditems', compact('products', 'id'));
    }

    public function shipped(Request $request)
    {

        MailController::status($request);

        $purchasedItems = PurchasedItems::all();
        foreach($purchasedItems as $purchasedItem){
            if($purchasedItem->id == $request->id){
                $purchasedItem->shipped=$request->shipped;
                $purchasedItem->update();
            }
        }
        return redirect('/solditems');
    }

}
