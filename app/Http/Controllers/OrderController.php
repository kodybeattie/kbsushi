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
          ->join('order_products','orders.order_id', '=', 'order_products.order_id')
          ->join('products','order_products.product_id', '=', 'products.product_id')
          ->select('users.phone_number','users.user_id','users.first_name','orders.datetime_ordered','order_products.product_id','order_products.quantity','products.product_name')
          ->orderBy('orders.datetime_ordered', 'asc')
          ->get();
        //dd($users);
        $products = DB::table('products')
        ->join('order_products','order_products.product_id', '=', 'products.product_id')
        ->select('products.*')
        ->get();
            //$cust = $users[0]->first_name;
           //dd($products);
      
            
        return view('backend/orders',compact('users','products'));
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
          //dd($products);
          
        DB::table('order_products')->insert(['order_id' => $order->getKey(),
                                            'product_id' => $product_id,
                                            'quantity' => $info['quantity']]);
      }
      Session::forget('cart');
      Session::flash('message', 'Order Complete, Please allow 15-20 mins for your food to be ready'); 
      return redirect()->home();
    }
}
