<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $order=Order::where('user_id',$user_id)->get();
        return $order;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product_id' => 'required|exists:products,id', // Assuming 'products' is the name of your products table
            'quantity' => 'required|integer|min:1', // Ensure quantity is a positive integer
        ]);

        // Get the authenticated user's ID
        $user_id = Auth::User()->id;

        // Retrieve the product_id and quantity from the form data
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $existingOrder = Order::where('user_id', $user_id)
        ->where('product_id', $product_id)
        ->first();

    if ($existingOrder) {
        // Update the existing order's quantity
        $existingOrder->quantity += $quantity;
        $existingOrder->save();
    } else {
        // Create a new order
        $order = new Order();
        $order->product_id = $product_id;
        $order->user_id = $user_id;
        $order->quantity = $quantity;
        // Add any additional order-related data here

        $order->save();
    }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $user_id = Auth::User()->id;
        echo $user_id;
        return $user_id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
