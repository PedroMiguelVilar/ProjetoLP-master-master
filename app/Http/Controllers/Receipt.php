<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;


class Receipt extends Controller
{
    public function index(){
        $products = Product::all();
        return view('receipt', compact('products'));
      }
      // Generate PDF
      public function createPDF() {
        // retreive all records from db
        $data = Product::all();   
        // share data to view
        $pdf = Pdf::loadview('receipt.receipt');
      return $pdf->setPaper('a4')->stream("pdf.pdf");
      }
}
