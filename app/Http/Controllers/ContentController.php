<?php

namespace App\Http\Controllers;
use App\Genre;
use App\Country;
use Illuminate\Http\Request;
use App\Content;
use App\Http\Controllers\DefaultVariable;
use Illuminate\Support\Facades\Storage;
use DB;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $videos = Content::all()->whereNotIn('type',['4','5']);
        $pathDefault = DefaultVariable::pathCoverVideo;
        return view('Contenido.Otros.index',compact('videos','pathDefault'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genre::all();
        $country = Country::all();
        return view('Contenido.Otros.create',compact('genero','country'));
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
        $type = 'others';
        return redirect()->route('contenido.index')->with("info",["msg"=>"Se ha registrado exitosamente.","action"=>route('uploadnotification',['id'=>$content->id,'type'=>$type]),'name'=>$content->name,'img'=> Storage::url($path)]);
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
        if($content->type != 4 && $content->type != 5){
            return view('Contenido.Otros.show',compact('content'));
        }else{
            $content = null;
            return view('Contenido.Otros.show',compact('content'));
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
        if($content->type != 4 && $content->type != 5){
            $genero = Genre::all();
            $country = Country::all();
            $genre_id = DB::table('detail')->where('content_id',$id)->get()->toArray();
            $language = DB::table('languages')->get()->toArray();
            return view('Contenido.Otros.edit',compact('content','genero','country','genre_id','language'));
        }else{
            $content = null;
            return view('Contenido.Otros.edit',compact('content'));
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
        return redirect()->route('contenido.index');
        // public/content/cover/FZzKgPXlvoSmM29qzRwZHYeeDD6LPKQefaKpACme.jpeg
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::findOrFail($id)->delete();
    }
}
