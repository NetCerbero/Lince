<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
	use SoftDeletes;
    protected $fillable = ['description','message','title','status','user_id'];

    public function questions(){
    	return $this->hasMany(Question::class,'poll_id','id');
    }
}
