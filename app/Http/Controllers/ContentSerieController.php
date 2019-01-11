<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Country;
use App\Content;
use DB;
use App\Episode;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DefaultVariable;
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

    public function getData($id){
        $episode = Episode::findOrFail($id);
        $data = array_merge($episode->toArray(),$episode->other->toArray());
        return $data;
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
        $content = Content::findOrFail($id);
        if($content->type == 4 || $content->type == 5){
            return view('Contenido.Series.show',compact('content'));
        }else{
            $content = null;
            return view('Contenido.Series.show',compact('content'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $content = Content::findOrFail($id);
        if($content->type == 4 || $content->type == 5){
            $genero = Genre::all()->where('type',1);
            $country = Country::all();
            $genre_id = DB::table('detail')->where('content_id',$id)->get()->toArray();
            $language = DB::table('languages')->get()->toArray();
            $rango = range(1,200);
            return view('Contenido.Series.edit',compact('content','genero','country','genre_id','language','rango')); 
        }else{
            $content = null;
            return view('Contenido.Series.edit',compact('content'));
        }
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
        if($request->hasFile('file')){
            $request['cover'] = Storage::putFile('public/content/cover', $request->file('file'));
        }
        $content = Content::findOrFail($id);
        $content->update($request->all());
        $content->genres()->sync($request['genre']);
        return redirect()->route('serie.index');
    }

    public function setData(Request $request, $id){
        $episode = Episode::findOrFail($id);
        $episode->update($request->all());
        $episode->other->update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::findOrFail($id);
        $episode->delete();
    }
}
