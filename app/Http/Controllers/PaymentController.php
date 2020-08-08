<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Book;
use App\Payment;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment($id)
    {
        $book = Book::find($id);
        return view('payment.payment')->with('book',$book);
    }


    public function stripeCard($id)
    {
        $book = Book::find($id);
        return view('payment.checkout')->with('book',$book);
    }
  
    public function stripeBank(Request $request)
    {
        $book = Book::find($request->id);
        return view('payment.checkout')->with('book',$book);
    }
  
    
    public function stripePost(Request $request)
    {

        // $request->validate([
        //     'payment_method' => 'required|in:card,bank',
        //     'quantity' => 'required|integer',
        // ]);

        $payment_method = 'card';

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Card Payment",
        ]);
        
        $payment = new Payment;

        $payment->book_id = $request->input('book_id');
        $payment->user_id = auth()->user()->id;
        $payment->quantity = $request->input('quantity');
        $payment->save();
        
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
