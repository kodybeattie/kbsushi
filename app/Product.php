<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
