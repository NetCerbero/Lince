<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Content;
use App\Genre;
use DB;
use App\Poll;
use App\ResponseClient;
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
        $movies = Content::where('type', 1)->orderBy('redate','desc')->paginate(12);
        return view('Public.allmovie',compact('movies','title'));
    }
    public function movieByGenre($id, $name=null){
        $genre = Genre::findOrFail($id);
        $movies = $genre->contents()->whereIn('type',[1])->orderBy('redate','desc')->paginate(12);
        $title = $genre->name;
        return view('Public.allmovie',compact('movies','title'));
    }
    public function allDocumentary(){
        $title = "Documentales";
        $movies = Content::where('type', 2)->orderBy('redate','desc')->paginate(12);
        return view('Public.allmovie',compact('movies','title'));
    }
    public function allSerie(){
        $series = Content::whereIn('type',[4,5])->orderBy('redate','desc')->paginate(12);
        $title = "Todas las series";
        return view('Public.allserie',compact('series','title'));
    }
    public function serieSeason($id, $name=null){
        $movie = Content::findOrFail($id);
        $temporadas = DB::table('episodes')->selectRaw('season, min(episode) as cap')->where('content_id',$id)->groupBy('season')->get()->toArray();
        return view('Public.season',compact('movie','temporadas'));
    }
    public function pollActive($id){
        $encuesta = Poll::findOrFail($id);
        if($encuesta->status == "t"){
            $questions = $encuesta->questions;
            return view('Public.poll',compact('encuesta','questions'));
        }else{
            abort(404);
        }
    }
    public function pollSave(Request $request, $id){
        // dd(Request()->ip());
        // dd($request);
        foreach ($request['rsp'] as $key => $value) {
            if($value['type'] == 'radio'){
                ResponseClient::create([
                    'host' => Request()->ip(),
                    'question_id' => $value['id'],
                    'response_id' => $request[$key]
                ]);
            }else{
                ResponseClient::create([
                    'host' => Request()->ip(),
                    'response' => $request[$key],
                    'question_id' => $value['id']
                ]);
            }
        }
    }
    public function searchContent($pattern){
        $result = DB::table('contents')->selectRaw('id, name, type, cover')->whereIn('type',[1,2,4,5])->where('name', 'like', "%$pattern%")->get();
        return ["result" => $result, "default" => DefaultVariable::pathCoverVideo];
    }
    public function allMusic(){
        $title = "Todos los videos musicales";
        $music = Content::where('type', 3)->orderBy('view','desc')->paginate(12);
        return view('Public.allmusic',compact('music','title'));
    }
}