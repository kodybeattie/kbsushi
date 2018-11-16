<?php

namespace App;


class Favorite extends Model
{
    public function Favor()
    {
    	return $this->belongsTo(Favorite::class)
    }
}
