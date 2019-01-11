<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
	use SoftDeletes;
    protected $fillable = ['path','language_id','extension','content_id','episode_id','subtitles_id'];

    public function language(){
    	return $this->belongsTo(Language::class,'language_id','id');
    }

    public function content(){
    	return $this->belongsTo(Content::class,'content_id');
    }

    public function episode(){
    	return $this->belongsTo(Episode::class,'episode_id');
    }
}
