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

    public function cart()
    {
      return $this->hasOne(Cart::class);
    }
}
