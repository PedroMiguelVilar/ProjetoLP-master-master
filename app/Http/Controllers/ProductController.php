<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return view('dropzone-file-upload');
    }


    public function show(Product $product)
    {
        $images = Image::all();

        return view('products.showproduct', compact('product', 'images'));
    }

    public function showcategory(Request $request)
    {
        
        $products = Product::all();
        $images = Image::all();

        $product_category = array();

        foreach($products as $product){
            if($product->category == $request->category){
                array_push($product_category, $product);
            }
        }

        return view('showproductscategory', compact('product_category', 'images'));
    }

    public function edit(Product $product)
    {

        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, Product $product)
    {
        
        $product->update($request->all());
        $images = Image::all();

        $product->hide_admin = $request->hide_admin;
        $product->update();
        
        return view('admin.editimages', compact('product', 'images'));
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
        $images = Image::all();
        $id = Auth::id();
        if ($id == $product->user->id) {
            return view('products.myproductsimages', compact('product', 'images'));
        }
        
    }

    static function products_sold()
    {

        $id = Auth::id();
        $carts = Cart::all();
        $products = Product::all();

        foreach ($carts as $cart)
            if ($id == $cart->user_id) {
                foreach ($products as $product) {
                    if ($product->id == $cart->product_id) {
                        if ($product->quantity > 1) {
                            $product->quantity -= $cart->quantity;
                            $product->update();
                        }
                    }
                }
            }
    }
}
