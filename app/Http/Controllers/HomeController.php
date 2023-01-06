<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers;
use App\Models\Image;
use App\Models\Product;
use App\Models\PurchasedItems;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products_carousel = Product::paginate(5);

        $purchased_items  = DB::table('purchased_items')
            ->select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        

        $products = Product::paginate(8);
        $images = Image::all();

        $all_products = Product::all();



        return view('welcome', compact('products_carousel', 'products', 'images', 'purchased_items', 'all_products'));
    }


    public function staffHome()
    {
        return view('welcome');
    }

    public function showusers()
    {
        $users = User::paginate(10);
        return view('admin.showusers', ["users" => $users]);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
