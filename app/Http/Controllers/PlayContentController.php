<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Http\Controllers\DefaultVariable;
class PlayContentController extends Controller
{
    public function playContent($id, $name=null){
    	$movie = Content::findOrFail($id);
    	if($movie->type === 1 || $movie->type === 2){
            $movie->view = $movie->view + 1;
            $movie->save();
    		$default['cover'] = DefaultVariable::pathCoverVideo;
    		$default['movie'] = DefaultVariable::pathContentVideo;
    		return view('Play.movie',compact('movie','default'));
    	}else{
    		abort(404);
    	}
    }
}
