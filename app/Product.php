<?php

namespace App;
use Illuminate\Http\Request;
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
}
