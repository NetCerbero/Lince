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
}
