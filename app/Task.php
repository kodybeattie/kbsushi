<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    public function scopeIncomplete($query)  // Task::incomplete
    {
    	return $query->where('completed', 0);
    }
    
    //public static function incomplete()
    //{
    //	return static::where('completed', 0)->get();
    //}
    
    public static function complete()
    {
    	return static::where('completed', 1)->get();
    }
}