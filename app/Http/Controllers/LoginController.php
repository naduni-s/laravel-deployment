<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::check() && Auth::user()->role == 'admin') {
                return redirect()->route('admin');  
            } else {
                return redirect()->route('home');  
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function authenticated(Request $request, $user)
{
    if ($request->has('redirect')) {
        return redirect($request->get('redirect'));
    }
    return redirect()->intended('/home');
}


}
