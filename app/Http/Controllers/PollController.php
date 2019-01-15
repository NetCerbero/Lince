<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use App\Type;
use App\Question;
use App\Response;
class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Poll::all();
        return view('Encuesta.index',compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all();
        return view('Encuesta.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth()->user()->id;
        $poll = Poll::create($request->all());
        foreach($request['questions'] as $item) {
            $item['poll_id'] = $poll->id;
            // dd($item);
            $question = Question::create($item);
            // dd($question);
            if($item['type_id']==1){
                foreach ($item['response'] as $rsp) {
                    Response::create(['response'=>$rsp, 'question_id'=>$question->id]);
                }
            }
        }
        return redirect()->route('encuesta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta = Poll::findOrFail($id);
        $questions = $encuesta->questions;
        return view('Encuesta.show',compact('encuesta','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
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
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
