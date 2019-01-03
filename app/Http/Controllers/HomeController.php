<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Genre;
use App\Http\Controllers\DefaultVariable;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $default = DefaultVariable::pathCoverVideo;
        $movie = Content::all()->whereIn('type',1)->sortByDesc('redate')->take(12);
        $lastMovies = Content::all()->whereIn('type',1)->sortByDesc('id')->take(12);
        return view('Public.index',compact('movie','lastMovies','default'));
    }

    public function allMovie(){
        $title = "Todas las películas";
        $movies = Content::where('type', 1)->paginate(12);
        return view('public.allmovie',compact('movies','title'));
    }

    public function movieByGenre($id, $name=null){
        $genre = Genre::findOrFail($id);
        $movies = $genre->contents()->whereIn('type',[1,2,3])->paginate(12);
        $title = $genre->name;
        return view('public.allmovie',compact('movies','title'));
    }

    public function allDocumentary(){
        $title = "Documentales";
        $movies = Content::where('type', 2)->paginate(12);
        return view('public.allmovie',compact('movies','title'));
    }
}
