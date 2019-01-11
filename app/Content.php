<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\DefaultVariable;
class Content extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description','type','cover','view','redate','country_id'];

    public function genres(){
    	return $this->belongsToMany(Genre::class,'detail','content_id','genre_id');
    }

    public function others(){
    	return $this->hasMany(Other::class,'content_id','id');
    }

    public function country(){
    	return $this->belongsTo(Country::class, 'country_id');
    }

    public function episodes(){
        return $this->hasMany(Episode::class,'content_id','id');
    }

    public function defaultVariable(){
        return ['cover'=>DefaultVariable::pathCoverVideo,'content'=>DefaultVariable::pathContentVideo];
    }
}
