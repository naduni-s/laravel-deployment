<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreLocatorController extends Controller
{
    public function index()
    {
        return view('store-locator');
    }
}
