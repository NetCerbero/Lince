<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Episode extends Model
{
	use SoftDeletes;
    protected $fillable = ['season','description_episode','redate','name_episode','episode','view','content_id'];

    public function other(){
    	return $this->hasOne(Other::class,'episode_id','id');
    }

    public function content(){
    	return $this->belongsTo(Content::class,'content_id');
    }
}
