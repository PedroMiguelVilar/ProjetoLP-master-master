<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class ReceiptController extends Controller
{
    //


    public function index(){

        $products = Product::all();

        return view('receipt', compact('products'));
    }

    public function createPDF() {
        // retreive all records from db
        $products = Product::all();
        // share data to view
        $pdf = FacadePdf::loadView('receipt', compact('products'));
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
}
