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
}
