<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $fillable = ['path','language_id','extension','content_id','episode_id','subtitles_id'];

    public function content(){
    	// return $this->hasOne();
    }
}
