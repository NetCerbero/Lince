<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
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
        $movie = Content::all()->whereIn('type',1)->sortByDesc('redate')->take(12);
        return view('public.index',compact('movie'));
    }
}
