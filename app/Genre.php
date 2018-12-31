<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name','type'];

    public function contents(){
    	return $this->belongsToMany(Content::class,'detail','genre_id','content_id');
    }
}
