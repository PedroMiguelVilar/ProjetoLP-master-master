<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Image;
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
        $images = Image::all();
        return view('wishlist.wishlist', compact('items', 'images'));
    }

    public static function WishlistStatus()
    {

        $items = Wishlist::all();

        return $items;
    }
    public function deletewishlistproducts(Wishlist $item){

        $item->delete();
        
        return redirect()->back();
    }
}
