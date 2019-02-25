<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Episode;
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

    public function playSerie($id, $nSeason, $cap, $name = null){
        $content = Content::findOrFail($id);
        $content->view = $content->view +1 ;
        $content->save();
        $capitulo = $content->episodes()->where('season',$nSeason)->where('episode',$cap)->get();
        $allCap = $content->episodes()->selectRaw('distinct season, episode')->where('season',$nSeason)->orderby('episode')->get()->toArray();
        $pnCap = $content->episodes()->selectRaw('distinct season,episode')->whereRaw("(episode = IFNULL((select min(episode) from episodes where season = $nSeason and episode > $cap),0) 
        or  episode = IFNULL((select max(episode) from episodes where season = $nSeason and episode < $cap),0)) and season = $nSeason")->orderBy('episode')->get()->toArray();
        $default['cover'] = DefaultVariable::pathCoverVideo;
        $default['movie'] = DefaultVariable::pathContentVideo;
        return view('Play.season',compact('capitulo','content','allCap','pnCap','nSeason','cap','default'));
    }

     public function playMusic($id, $name=null){
        $movie = Content::findOrFail($id);
        if($movie->type === 3){
            $movie->view = $movie->view + 1;
            $movie->save();
            $default['cover'] = DefaultVariable::pathCoverVideo;
            $default['movie'] = DefaultVariable::pathContentVideo;
            return view('Play.music',compact('movie','default'));
        }else{
            abort(404);
        }
    }
}
