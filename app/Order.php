<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $primaryKey = 'order_id';
  const CREATED_AT = 'datetime_ordered';
  const UPDATED_AT = 'datetime_completed';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'order_id', 'user_id', 'datetime_ordered','datetime_completed'
  ];

  public function products()
  {
    return $this->hasMany(Product::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
