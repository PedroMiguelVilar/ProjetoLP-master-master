<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.showproducts', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $id = Auth::id();

        $product = new Product();
        $product->user_id = $id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

        return redirect('/products');
    }


    public function show(Product $product)
    {

        return view('products.showproduct', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/products');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    public function myproducts(Product $product)
    {
        $id = Auth::id();
        $products = Product::all();
        return view('products.myproducts', compact('products', 'id'));
    }

    public function editmyproducts(Product $product)
    {
        $id = Auth::id();
        if ($id == $product->user->id) {
            return view('products.myproductsedit', ['product' => $product]);
        }
    }
    public function deletemyproducts(Product $product)
    {
        $id = Auth::id();
        if ($id == $product->user->id) {
            $product->delete();
        }
        return redirect('myproducts');
    }

    public function updatemyproducts(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('myproducts');
    }

}
