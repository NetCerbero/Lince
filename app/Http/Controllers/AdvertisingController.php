<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertising::all();
        return view('Publicidad.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publicidad.create');
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
            $path = Storage::putFile('public/ads', $request->file('file'));
            $request['path'] = $path;
            Advertising::create($request->all());
        }
        return redirect()->route('publicidad.index');
    }

    public function statusChange($id){
        $ad = Advertising::findOrFail($id);
        if($ad->status == 't'){
            $ad->status = 'f';
        }else{
            $ad->status = 't';
        }
        $ad->save();
        return redirect()->route('publicidad.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertising::findOrFail($id)->delete();
    }
}
