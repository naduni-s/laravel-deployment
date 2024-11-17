<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        // Get cart items from session
        $cart = session('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $courierCharge = 400; // Fixed courier charge

        // Create an order
        $order = new Order();
        $order->name = $validatedData['name'];
        $order->phone = $validatedData['phone'];
        $order->address = $validatedData['address'];
        $order->postal_code = $validatedData['postal_code'];
        $order->products = json_encode($cart); // Convert cart items to JSON
        $order->subtotal = $subtotal;
        $order->courier_charge = $courierCharge;
        $order->total_price = $validatedData['total_price'];
        $order->payment_method = $validatedData['payment_method'];
        $order->save(); // Save order to the database

        // Clear the cart session
        session()->forget('cart');

        // Redirect to a success page (or the homepage)
        return redirect('/')->with('success', 'Order placed successfully!');
    }

    // Accept Order
    public function accept($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'accepted'; // Assuming you have a 'status' field in the orders table
            $order->save();

            return redirect()->back()->with('success', 'Order accepted successfully.');
        }

        return redirect()->back()->with('error', 'Order not found.');
    }

    // Cancel Order
    public function cancel($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'cancelled'; // Assuming you have a 'status' field in the orders table
            $order->save();

            return redirect()->back()->with('success', 'Order cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Order not found.');
    }
}
