<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['language'];

    public function others(){
    	// $this->hasMany()
    }
}
