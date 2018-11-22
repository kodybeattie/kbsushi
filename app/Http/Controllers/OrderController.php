<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        $users = DB::table('orders')
          ->join('users', 'orders.user_id', '=', 'users.user_id')
          ->select('users.first_name','orders.datetime_ordered')
          ->orderBy('orders.datetime_ordered', 'asc')
          ->get();

        dd($users);

        return view('backend/orders');
    }

    public function create(Request $request)
    {
      $products = Session::get('cart')[0];

      $order = Order::create([
          'user_id' => Auth::id(),
          'datetime_ordered' => date('Y-m-d H:i:s'),
          'datetime_completed' => null]);

      foreach ($products as $product_id => $info)
      {
        DB::table('order_products')->insert(['order_id' => $order->getKey(),
                                            'product_id' => $product_id,
                                            'quantity' => $info['quantity']]);
      }
      return redirect()->home();
    }
}
