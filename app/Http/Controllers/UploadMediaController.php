<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Language;
use App\Other;
class UploadMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function generateOptionIdioma(){
        $languages = Language::all();
        $option = "<option value=':ID'>:LANGUAGE</option>";
        $html = "";
        foreach ($languages as $item) {
            $opt = str_replace(':ID', $item->id, $option);
            $opt = str_replace(':LANGUAGE', $item->language, $opt);
            $html =  $html.$opt;
        }
        return $html;
    }

    public function uploadView($id, $type){
        $languages = $this->generateOptionIdioma();//Language::all();
        return view('Contenido.Otros.upload',compact('id','languages','type'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $request['extension'] = $request->file('file')->getClientOriginalExtension();
            $request['path'] = Storage::putFile('public/content/multimedia', $request->file('file'));
            $request['language_id'] = $request['language'];
            if($request['content_type'] == 'others'){
                $request['content_id'] = $request['id'];
            }else{
                $request['episode_id'] = $request['id'];
            }
            Other::create($request->all());
        }
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
