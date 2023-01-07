<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Search extends Controller
{


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $i = 0;
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    if ($product->name) {
                        $output .=
                            '<tr>' .
                            '<td>' .
                            '<a href="searchproducts?search=' . $product->name . '">' . $product->name .
                            '<a>' .
                            '</td>' .
                            '</tr>';
                    }
                    $i++;
                    if ($i == 3) {
                        break;
                    }
                }
                return Response($output);
            }
        }
    }


    public function searchpage(Request $request)
    {

        if($request->search == "" && $request->order == ""){
            return Redirect::back()->withErrors(['msg' => 'The Message']);
        }

        $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")->get();
        $images = Image::all();

        if ($request->order == "price_desc")
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")
                ->orderBy('price', 'desc')
                ->get();

        if ($request->order == "price_asc")
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")
                ->orderBy('price', 'asc')
                ->get();

        if ($request->order == "name")
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")->get();

        if ($request->order == "quantity")
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")
                ->orderBy('quantity', 'desc')
                ->get();


        return view('searchproducts', compact('products', 'images'));
    }
}
