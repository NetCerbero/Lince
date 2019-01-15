<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseClient extends Model
{
    protected $fillable = ['host','response','question_id','response_id'];

 	public function rsp(){
 		return $this->belongsTo(Response::class,'response_id');
 	}

 	public function qst(){
 		return $this->belongsTo(Question::class,'question_id');
 	}
}
