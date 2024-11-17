<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mens;
use App\Models\Women;
use App\Models\Unisex;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    
    public function index()
    {
        $mensCount = Mens::count();
        $womenCount = Women::count();
        $unisexCount = Unisex::count();
        $totalProducts = $mensCount + $womenCount + $unisexCount;

        $totalOrders = DB::table('orders')->count();
        $orders = DB::table('orders')->get();
        $userName = Auth::user()->name;
        $userName = Auth::check() ? Auth::user()->name : 'Guest';
        return view('admin.index', compact('totalProducts', 'totalOrders', 'userName','orders'));
    }
    

public function storeProduct(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required|string|max:1000',
        'category' => 'required|in:mens,women,unisex',
    ]);

    $imagePath = $request->file('image_url')->store('product_images', 'public');

    $productData = [
        'name' => $request->name,
        'price' => $request->price,
        'image_url' => $imagePath,
        'description' => $request->description,
    ];

    switch ($request->category) {
        case 'mens':
            DB::table('mens')->insert($productData); 
            break;
        case 'women':
            DB::table('women')->insert($productData);
            break;
        case 'unisex':
            DB::table('unisex')->insert($productData); 
            break;
        default:
            return redirect()->back()->with('error', 'Invalid category selected.');
    }

    return redirect()->back()->with('success', 'Product added successfully!');
}



public function showProducts(Request $request)
{
    $category = $request->input('category', 'mens');

    switch ($category) {
        case 'mens':
            $products = DB::table('mens')->take(3)->get();
            break;
        case 'women':
            $products = DB::table('women')->take(3)->get();
            break;
        case 'unisex':
            $products = DB::table('unisex')->take(3)->get();
            break;
        default:
            $products = DB::table('mens')->take(3)->get(); 
            break;
    }

    return view('home', ['products' => $products]);
}

public function searchProduct($id)
{
    $product = DB::table('mens')->where('id', $id)->first();

    if (!$product) {
        $product = DB::table('women')->where('id', $id)->first();
    }

    if (!$product) {
        $product = DB::table('unisex')->where('id', $id)->first();
    }

    if ($product) {
        return response()->json(['success' => true, 'product' => $product]);
    }

    return response()->json(['success' => false], 404);
}
public function updateProduct(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string|max:1000',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'product_id' => 'required|integer',
        'category' => 'required|in:mens,women,unisex',
    ]);

    $imagePath = $request->file('image_url') ? $request->file('image_url')->store('product_images', 'public') : null;

    $updateData = [
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ];

    if ($imagePath) {
        $updateData['image_url'] = $imagePath;
    }

    $table = $request->category; // Determine table based on category

    DB::table($table)
        ->where('id', $request->product_id)
        ->update($updateData);

    return redirect()->back()->with('success', 'Product updated successfully!');
}





}
