<?php

namespace App;


class Favourite extends Model
{
	public $timestamps = false;

	protected $table = 'favourites';
	protected $primaryKey = ['user_id', 'product_id'];
	public $incrementing = false;

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public static function getByUserId($id)
  {
    return static::selectRaw('*')
                    ->where('product_id', '=', $id)
                    ->orderBy('product_id','asc')
                    ->get()
                    ->toArray();
  }
}
