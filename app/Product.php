<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  prsotected $fillable=['product_id','product_name','category','product_description','price'];


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

  public function cart()
  {
    return $this->belongsTo(Cart::class);
  }
}
