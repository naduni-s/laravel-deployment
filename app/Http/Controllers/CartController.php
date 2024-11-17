<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    $cart = session()->get('cart', []);
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    $size = $request->input('size');
    $productKey = $productId . '_' . $size;

    if (isset($cart[$productKey])) {
        $cart[$productKey]['quantity'] += $quantity;
    } else {
        $cart[$productKey] = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image_url' => $request->input('image_url'),
            'quantity' => $quantity,
            'size' => $size
        ];
    }


    session()->put('cart', $cart);
    $cartCount = array_sum(array_column($cart, 'quantity'));

    return response()->json([
        'success' => true,
        'cartCount' => $cartCount
    ]);
}
public function clearCart(Request $request)
{
    session()->forget('cart'); // Remove the cart session
    return response()->json(['message' => 'Cart cleared successfully']);
}


    public function showCart()
    {
        
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
    public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Cart updated successfully');
    }

    return redirect()->route('cart')->with('error', 'Item not found in cart');
}
public function remove($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Item removed successfully');
    }

    return redirect()->route('cart')->with('error', 'Item not found in cart');
}


}
