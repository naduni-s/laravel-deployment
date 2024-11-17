<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUserDetails()
{
    if (Auth::check()) {
        // Debug: Check if the user is authenticated
        $user = Auth::user();

        $orders = $user->orders; // Get the user's orders
        return view('userdet', compact('orders'));
    } else {
        return redirect()->route('login')->with('error', 'Please login to view your orders.');
    }
}



}
