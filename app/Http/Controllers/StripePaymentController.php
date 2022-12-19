<?php
    
namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Stripe;
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => CartController::order() * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "SellHighBuyLow" 
        ]);
      
        Session::flash('success', 'Payment successful! You can go close this page now.');


        PurchasedItemsController::store();
        ProductController::products_sold();
        CartController::deletecart();

        return back();
    }
}