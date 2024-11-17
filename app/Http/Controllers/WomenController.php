<?php

namespace App\Http\Controllers;
use App\Models\Women;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class WomenController extends Controller
{
    public function index()
    {
        // Retrieve all products from the 'mens' table
        $products = Women::all();
        
        // Pass the 'products' variable to the view
        return view('forwomen', compact('products'));
    }
    
    public function showProducts()
{
    $products = Women::all();

    return view('women', ['women' => $products]);
}
public function WomenProducts()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $userName = Auth::user()->name;
    } else {
        // Redirect to login page or handle accordingly if the user is not authenticated
        return redirect()->route('login'); // or return a response like 'Unauthorized'
    }

    // Fetch women products from the database (use Women model)
    $womenproducts = Women::all();

    // Pass the correct variables to the view
    return view('admin.womenproduct', compact('womenproducts', 'userName'));
}

// add product to women table
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

    Women::create([
        'name' => $request->name,
        'price' => $request->price,
        'image_url' => $imagePath,
        'description' => $request->description,
    ]);

    return redirect()->back()->with('success', 'Product added successfully');
}


// update the product in women table
public function updateProduct(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Women::findOrFail($id);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    if ($request->hasFile('image_url')) {
        if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
            Storage::delete('public/' . $product->image_url);
        }

        $imagePath = $request->file('image_url')->store('images', 'public');
        $product->image_url = $imagePath; 
    }

    $product->save();

    return redirect()->back()->with('success', 'Product updated successfully!');
}

// delete the product in women table 
public function destroyProduct($id)
{
    $product = Women::findOrFail($id);

    if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
        Storage::delete('public/' . $product->image_url);
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully!');
}
}


