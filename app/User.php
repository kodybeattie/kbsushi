<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/* NOT SURE IF THIS IS RIGHT OR EVEN NEEDED YET
    public function order(Order $order)
    {
      $this->orders()->save($order);
    }
*/

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function cart()
    {
      return $this->hasOne(Cart::class);
    }
}
