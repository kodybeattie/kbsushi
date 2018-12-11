<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Order extends Model
{
  protected $table = 'vendor_order_history';
    public $timestamps = false;

    public function vendor_order()
    {
      $this->belongsTo(Vendor_Order::class);
    }
}
