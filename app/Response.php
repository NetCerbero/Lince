<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
	use SoftDeletes;
    protected $fillable = ['response','question_id'];

    public function question(){
    	return $this->belongsTo(Question::class,'question_id');
    }

    public function rspClient(){
    	return $this->hasMany(ResponseClient::class,'response_id');
    }

    public function slideArray($data){
    	preg_match_all('/([a-zA-Z0-9ZñÑáéíóúÁÉÍÓÚ]+\s*[a-zA-Z0-9ZñÑáéíóúÁÉÍÓÚ]*\s*[a-zA-Z0-9ZñÑáéíóúÁÉÍÓÚ]*)/',$data,$matches);
    	return $matches[0];
    }
}
