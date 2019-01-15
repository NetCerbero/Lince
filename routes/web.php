<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/panel','PanelController');
    Route::resource('/usuario','UsuarioController');
    Route::resource('/contenido','ContentController');
    Route::resource('/upload','UploadMediaController');
    Route::get('/viewupload/{id}/{type}','UploadMediaController@uploadView')->name('uploadnotification');
    Route::resource('/serie','ContentSerieController');
    Route::get('/serie/data/{id}','ContentSerieController@getData')->name('serieData');
    Route::post('/serie/data/set/{id}','ContentSerieController@setData')->name('serieDataUpdate');
    Route::resource('/other','OtherController');
    Route::resource('/encuesta','PollController');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/play/movie/{id}/{name?}','PlayContentController@playContent')->name('playcontent');
Route::get('/movie/all','HomeController@allMovie')->name('allmovie');
Route::get('/movie/{id}/genero/{name?}','HomeController@movieByGenre')->name('movieGenre');
Route::get('/documentary','HomeController@allDocumentary')->name('alldocumentary');
Route::get('/serie/all/lince','HomeController@allSerie')->name('allseries');
Route::get('/serie/season/{id}/{name?}','HomeController@serieSeason')->name('seasonSerie');
Route::get('/serie/{id}/season/{nSeason}/episode/{cap}/{name?}','PlayContentController@playSerie')->name('playSerie');
Route::get('/poll/{id}/realease','HomeController@pollActive')->name('doPoll');

Route::post('/poll/{id}/response','HomeController@pollSave')->name('savePoll');
// 	$user = new App\User;
// 	$user->name = 'Luis Yerko';
// 	$user->lastname ='Laura Tola';
// 	$user->email = 'luis@gmail.com';
// 	$user->password = bcrypt('123456');
// 	$user->photo = 'foto.jpg';
// 	$user->role = null;
// 	$user->save();
// 	return $user;
// });
