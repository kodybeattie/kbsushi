<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable=['product_id','product_name','category','product_description','price'];

  protected $primaryKey = 'product_id';

  public function products()
  {
    return $this->hasMany(Product::class);
  }

  public function ingredients()
  {
    return $this->hasMany(Ingredient::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function vendor_order()
  {
    return $this->belongsTo(Vendor_Order::class);
  }

  public static function getByCategory($category)
  {
    return static::selectRaw('*')
                    ->where('category', '=', $category)
                    ->orderBy('product_name','asc')
                    ->get()
                    ->toArray();
  }

  public static function addToCart($product_id, $quantity)
  {
    $product = Product::find($product_id);
    dd($quantity);
  //  $cart = session()->get('cart');
/*
    //if cart is empty then this the first product
    if(!$cart) {

        $cart = [
                $id => [
                    "product_name" => $product->product_name,
                    "quantity" => $quantity,
                    "price" => $product->price
                ]
        ];

        session()->put('cart', $cart);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // if cart not empty then check if this product exist then increment quantity
    if(isset($cart[$id])) {

        $cart[$id]['quantity']++;

        session()->put('cart', $cart);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
        "product_name" => $product->product_name,
        "quantity" => $quantity,
        "price" => $product->price
    ];

    session()->put('cart', $cart);

    //return redirect()->back()->with('success', 'Product added to cart successfully!');
*/
  }
}
