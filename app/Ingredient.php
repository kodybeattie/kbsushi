<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
  protected $table = 'product_ingredients';
  protected $primaryKey = ['product_id', 'ing_id'];
	public $incrementing = false;

  public $timestamps = false;

    public function vendor_order()
    {
      return $this->belongsTo(Vendor_Order::class);
    }

    public function product()
    {
      return $this->belongsTo(Product::class);
    }
}
