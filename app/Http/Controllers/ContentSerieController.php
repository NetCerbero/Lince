<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Country;
use App\Content;
use DB;

class ContentSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $series = COntent::all()->whereIn('type',['4','5']);
        $pathDefault = DefaultVariable::pathCoverVideo;
        return view('Contenido.Series.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genre::all()->where('type',1);
        $country = Country::all();
        return view('Contenido.Series.create',compact('genero','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $path = Storage::putFile('public/content/cover', $request->file('file'));
            $request['cover'] = $path;
        }else{
            $path = DefaultVariable::pathCoverVideo;
        }
        $content = Content::create($request->all());
        $content->genres()->attach($request['genre']);
        $type = 'series';
        return redirect()->route('serie.index')->with("info",["msg"=>"Se ha registrado exitosamente.","action"=>route('uploadnotification',['id'=>$content->id,'type'=>$type]),'name'=>$content->name,'img'=> Storage::url($path)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
