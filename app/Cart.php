<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

  public $chosenProducts = array();
  public $productQuantities = array();
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function products()
  {
    return $this->hasMany(Product::class);
  }

  public function addProducts($product, $quantity)
  {
    $this->products()->create(compact('product'));
  }
}
