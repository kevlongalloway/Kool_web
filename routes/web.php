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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('api/user', 'APIController@user');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('user.home');

/*ADMIN ROUTES*/
Route::get('admin','Admin\Auth\LoginController@showLoginForm');
Route::post('admin','Admin\Auth\LoginController@login')->name('admin.login');

Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');

Route::resource('organizations','Admin\OrganizationController');
Route::resource('users','UserController');
Route::resource('songs','SongController');
Route::resource('playlists','PlaylistController')->except(['index']);
Route::resource('classrooms', 'ClassroomController');
/*ORGANIZATION ROUTES*/
Route::get('club','Organization\Auth\LoginController@showLoginForm');
Route::post('club','Organization\Auth\LoginController@login')->name('organization.login');

Route::get('club/home','Organization\HomeController@index')->name('organization.home');


/*TEACHER ROUTES*/
Route::get('portal', 'Teacher\Auth\LoginController@showLoginForm');
Route::post('portal','Teacher\Auth\LoginController@login')->name('teacher.login');

Route::get('portal/home','Teacher\HomeController@index')->name('teacher.home');




/*Access Code Routes*/
Route::post('/register/access-code', 'AccessCodeController@AccessCodeRequest')->middleware(['throttle:100,10'])->name('access-code');

Route::get('/registration/{guard}/{accesscode}', 'AccessCodeController@showRegisterForm')->middleware(['throttle:100,10']);


Route::post('/registration/access-code','AccessCodeController@register')->middleware(['throttle:100,10'])->name('accesscode.register');


Route::get('api/grade/{grade}/subject/{subject}','SongController@browse');


Route::get('api/playlists/{userid}','PlaylistController@index');
Route::get('api/teacher-playlists','PlaylistController@getTeacherPlaylists');

Route::get('api/playlists/{playlist_id}/songs','PlaylistController@showSongs');


Route::get('/playlists/{playlists_id}/song/{song}','PlaylistController@attachSongToPlaylist');
Route::get('/classrooms/{classroom_id}/playlists/{playlist_id}','ClassroomController@attachPlaylist');
Route::post('/playlists/classroom/{classroom_id}/','ClassroomController@createPlaylist');

Route::get('/api/classrooms','ClassroomController@getClassroomsNoParams');
Route::get('/api/classrooms/available-students','ClassroomController@getAvailableStudents');












Route::get('/{any}','DefaultController@index')->where('any','.*');

