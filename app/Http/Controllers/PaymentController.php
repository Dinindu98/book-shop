<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Book;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $book = Book::find($id);
        return view('payment.payment')->with('book',$book);
    }


    public function stripe(Request $request)
    {
        $book = Book::find($request->id);
        return view('payment.checkout')->with('book',$book);
    }
  
    
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if($request->payment_method === 'card'){
            Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Card Payment",
                "owner" => [
                    "email" => "dinindu.ayagama@gmail.com",
                  ], 
        ]);
        }else{
            Stripe\Source::create([
                "type" => "ach_credit_transfer",
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Bank Payment",
                "owner" => [
                  "email" => "dinindu.ayagama@gmail.com",
                ],
              ]);
        }
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
