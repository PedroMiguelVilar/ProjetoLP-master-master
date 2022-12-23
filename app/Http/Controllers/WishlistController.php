<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //

    public function addToWishlist(Request $request)
    {
        $wishlist = new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->status = $request->status;
        $wishlist->save();
        return redirect()->back();
    }

    public function showWishList()
    {
        $items = Wishlist::all();
        return view('wishlist.wishlist', compact('items'));
    }

    static function WishlistStatus()
    {

        $items = Wishlist::all();

        return $items;
    }
    public function deletewishlistproducts(Wishlist $item){

        $item->delete();
        
        return redirect()->back();
    }
}
