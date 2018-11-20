<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Session;
class OrderController extends Controller
{
    public function __construct()
    {
      //$this->middleware('auth')->except(['index', 'show']);
      $this->middleware('admin');

    }
    public function index()
    {

        //$products = DB::table('products')->pluck('product_name');
      
        // $users = DB::table('orders')   
        //             ->join('users', 'orders.user_id', '=', 'users.user_id')
        //             ->join('products', 'users.id', '=', 'orders.user_id')
        //             ->select('users.first_name','users.phone_number','orders.datetime_ordered')
        //             ->get();
        //dd($users);
        // foreach ($users as $user_id => $first_name) {
        //     echo $first_name;
        // }




        return view('backend/orders');
    }
}
