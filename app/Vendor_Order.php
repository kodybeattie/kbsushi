<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Order extends Model
{
    public function vendor_order()
    {
      $this->belongsTo(Vendor_Order::class);
    }
}
