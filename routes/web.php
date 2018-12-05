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
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/user',function(){
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
