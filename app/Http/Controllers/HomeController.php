<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers;
use App\Models\Product;
use App\Models\User;

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
        $products = Product::paginate(8);

        return view('welcome', compact('products_carousel', 'products'))  ;
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
