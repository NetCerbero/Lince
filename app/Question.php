<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
	use SoftDeletes;
    protected $fillable = ['question','required','type_id','poll_id'];

    public function poll(){
    	return $this->belongsTo(Poll::class, 'poll_id');
    }

    public function responses(){
    	return $this->hasMany(Response::class, 'question_id','id');
    }
    public function type(){
    	return $this->belongsTo(Type::class,'type_id');
    }

    public function responseClient(){
        return $this->hasMany(ResponseClient::class,'question_id','id');
    }
}
