<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showCheckout()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Please log in to proceed to checkout.');
    }

    // Proceed with showing the checkout page
    return view('checkout');
}


    public function confirmOrder(Request $request)
{
    $request->validate([
        'payment_method' => 'required',
    ]);

    

    
    

    session()->forget('cart');

    return redirect()->route('home')->with('success', 'Your order has been confirmed!');
}

}
