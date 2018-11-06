<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function vendor_order()
    {
      return $this->belongsTo(Vendor_Order::class);
    }
}
