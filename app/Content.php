<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description','type','cover','view','redate','country_id'];

    public function genres(){
    	return $this->belongsToMany(Genre::class,'detail','content_id','genre_id');
    }

    public function others(){
    	// return $this->hasMany();
    }
}
