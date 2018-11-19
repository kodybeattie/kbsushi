<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function create(Request $request)
    {
      $products = Session::get('cart')[0];

      $order = Order::create([
          'user_id' => Auth::id(),
          'datetime_ordered' => date('Y-m-d H:i:s'),
          'datetime_completed' => null]);
      foreach ($products as $product)
      {
        $orderProduct = Order_product::create([
                'order_id' => $order->id(),
                'product_id' => $products["product_id"],
                'quantity' => $product['quantity']);
      }
      redirect()->home();
    }
}
