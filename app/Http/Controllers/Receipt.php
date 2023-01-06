<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Notifications\Messages\MailMessage;

class Receipt extends Controller
{
    public function index(){
        $products = Product::all();
        return view('receipt', compact('products'));
      }
      // Generate PDF
      public function createPDF() {
        // retreive all records from db
        $product = Product::all();
        // share data to view
        view()->share($product);
        $pdf = Pdf::loadView('receipt', $product->toArray());
        return $pdf->download('invoice.pdf');
      }
}
