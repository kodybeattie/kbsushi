<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function vendor_order()
    {
      return $this->belongsTo(Vendor_Order::class);
    }

    public function product()
    {
      return $this->belongsTo(Product::class);
    }
}
