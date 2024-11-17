<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mens; 
use App\Models\Women;
use App\Models\Unisex; 

class HomeProductController extends Controller
{
    public function showProducts()
    {
        $menProducts = Mens::orderBy('id', 'asc')->take(3)->get();
        $womenProducts = Women::orderBy('id', 'asc')->take(3)->get();
        $unisexProducts = Unisex::orderBy('id', 'asc')->take(3)->get();
        
        return view('home', compact('menProducts', 'womenProducts', 'unisexProducts'));
    }
}
