<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','first_name', 'last_name', 'email_address', 'phone_number', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function checkout(Order $order)
    {
      $this->orders()->save($order);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function favorites()
    {
      return $this->hasMany(Favorite::class);
    }


    public function setting()
    {
      return $this->hasOne(Setting::class);
    }
    
    

    public static function phoneNumber($data) {
      // add logic to correctly format number here
      // a more robust ways would be to use a regular expression
      return "(".substr($data, 0, 3).")".'-'.substr($data, 3, 3)."-".substr($data,6);
     }

    //  public function checkAdmin($admin){
    //    if $admin == 1
    //  } 
 


}
