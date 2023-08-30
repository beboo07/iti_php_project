<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user_id = Auth::User()->id;
        $userOrders = Order::where('user_id', $user_id)->get();

        $userOrderedProducts = [];

        foreach ($userOrders as $order) {
            $product = Product::find($order->product_id);

            if ($product) {
                $userOrderedProducts[] = [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'quantity' => $order->quantity,
                ];
            }
        }

        return view('home', compact('userOrderedProducts'));


    }
    public function adminHome(){
        $user_id = Auth::User()->id;

        $userOrders = Order::where('user_id', $user_id)->get();

        $userOrderedProducts = [];

        foreach ($userOrders as $order) {
            $product = Product::find($order->product_id);

            if ($product) {
                $userOrderedProducts[] = [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'quantity' => $order->quantity,
                ];
            }
        }

        return view('admin-home', compact('userOrderedProducts'));

    }

}
