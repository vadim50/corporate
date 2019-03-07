<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    function articles(){
    	return $this->hasMany('Corp\Article');
    }
}
