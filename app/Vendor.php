<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{
  
  public $timestamps = false;
  protected $fillable=['vendor_id','vendor_name','phone_number'];

  protected $primaryKey = 'vendor_id';

    public function vendor_order()
    {
      return $this->belongsTo(Vendor_Order::class);
    }

    public static function phoneNumber($data) {
      // add logic to correctly format number here
      // a more robust ways would be to use a regular expression
      return "(".substr($data, 0, 3).")".'-'.substr($data, 3, 3)."-".substr($data,6);
     }
}
