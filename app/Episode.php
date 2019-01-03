<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['season','description_episode','redate','name_episode','episode','view','content_id'];
}
