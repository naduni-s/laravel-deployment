<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MenController extends Controller

{
    public function index()
    {
        // Retrieve all products from the 'mens' table
        $products = Mens::all();
        
        // Pass the 'products' variable to the view
        return view('formen', compact('products'));
    }
     
    public function showProducts()
{
    $products = Mens::all();

    return view('men', ['men' => $products]);
}


//display all men products in admin page
public function MenProducts()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $userName = Auth::user()->name;
    } else {
        // Redirect to login page or handle accordingly if the user is not authenticated
        return redirect()->route('login'); // or return a response like 'Unauthorized'
    }

    $menproducts = Mens::all();
    return view('admin.menproduct', compact('menproducts', 'userName'));
}

// add product to men table
public function storeProduct(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required|string|max:1000',
    ]);

    if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {
        $imagePath = $request->file('image_url')->store('product_images', 'public');
        
    } else {
        $imagePath = null; 
    }

    Mens::create([
        'name' => $request->name,
        'price' => $request->price,
        'image_url' => $imagePath,
        'description' => $request->description,
    ]);

    return redirect()->back()->with('success', 'Product added successfully');
}



// update the product in men table
public function updateProduct(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Mens::findOrFail($id);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    if ($request->hasFile('image_url')) {
        if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
            Storage::delete('public/' . $product->image_url);
        }

        $imagePath = $request->file('image_url')->store('product_images', 'public');
        $product->image_url = $imagePath; 
    }

    $product->save();

    return redirect()->back()->with('success', 'Product updated successfully!');
}

// delete the product in men table 
public function destroyProduct($id)
{
    $product = Mens::findOrFail($id);

    if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
        Storage::delete('public/' . $product->image_url);
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully!');
}
    
}
