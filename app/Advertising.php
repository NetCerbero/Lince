<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertising extends Model
{
	use SoftDeletes;
	protected $fillable = ['title','path','status'];
}
