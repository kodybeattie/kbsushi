<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
  public function create($products, $quantities)
  {
    return view('cart', compact($products), compact($quantities));
  }
}
