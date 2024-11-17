<?php

namespace App\Http\Controllers;

use App\Models\Mens;
use App\Models\Women;
use App\Models\Unisex;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function removeProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $tables = ['mens', 'women', 'unisex']; 
    
        foreach ($tables as $table) {
            // Check if the product exists in the current table
            $productExists = DB::table($table)->where('id', $productId)->exists();
    
            if ($productExists) {
                DB::table($table)->where('id', $productId)->delete();
                
                return redirect()->back()->with('success', "Product with ID $productId has been removed from $table table.");
            }
        }
    
        return redirect()->back()->with('error', 'Product ID not found in any category.');
    }
    public function filterMen(Request $request)
    {
        // Get the max price from the request (default to 15000 if not set)
        $maxPrice = $request->input('max_price', 15000);
    
        // Fetch products with a price less than or equal to the max price
        $products = Mens::where('price', '<=', $maxPrice)
            ->get();
    
        return view('formen', compact('products', 'maxPrice'));
    }

    public function filterWomen(Request $request)
    {
        // Get the max price from the request (default to 15000 if not set)
        $maxPrice = $request->input('max_price', 15000);
    
        // Fetch products with a price less than or equal to the max price
        $products = Women::where('price', '<=', $maxPrice)
            ->get();
    
        return view('forwomen', compact('products', 'maxPrice'));
    }

    public function filterUnisex(Request $request)
    {
        // Get the max price from the request (default to 15000 if not set)
        $maxPrice = $request->input('max_price', 15000);
    
        // Fetch products with a price less than or equal to the max price
        $products = Unisex::where('price', '<=', $maxPrice)
            ->get();
    
        return view('unisex', compact('products', 'maxPrice'));
    }

public function search(Request $request)
    {
        
        $query = $request->input('query');

        $menProducts = Mens::where('name', 'LIKE', "%{$query}%")->get();
        $womenProducts = Women::where('name', 'LIKE', "%{$query}%")->get();
        $unisexProducts = Unisex::where('name', 'LIKE', "%{$query}%")->get();

        $products = $menProducts->merge($womenProducts)->merge($unisexProducts);

        return view('search-results', ['products' => $products, 'query' => $query]);
    }
  
    public function show($id)
{
    // Check if the product exists in any of the categories
    $product = Mens::find($id) ?? Women::find($id) ?? Unisex::find($id);

    // If product is not found, throw a 404 error
    if (!$product) {
        abort(404);
    }

    // Return the details view with the product data
    return view('detail', compact('product'));
}

// path for men products 
public function index()
{
    return view('admin.menproduct'); 
}
    


}
