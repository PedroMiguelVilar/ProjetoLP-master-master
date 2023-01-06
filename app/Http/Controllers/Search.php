<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    if($product->name){
                    $output .= 
                        '<tr>' .
                        '<td>'.
                        '<a href="searchproducts?search='.$product->name.'">'. $product->name .
                        '<a>'.
                        '</td>' .
                        '</tr>';
                    }
                        $i++;
                        if($i==3){
                            break;
                        }
                }
                return Response($output);
            }
        }
    }

    
    public function searchpage(Request $request){
        $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . "%")->get();
        $images = Image::all();
        
        return view('searchproducts', compact('products', 'images'));
    }
}
