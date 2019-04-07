
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/CreateOrganization','Admin\CreateOrgController@index')->name('admin.createorg');


/*ADMIN ROUTES*/
Route::get('admin','Admin\Auth\LoginController@showLoginForm');
Route::post('admin','Admin\Auth\LoginController@login')->name('admin.login');

Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');

Route::resource('organizations','Admin\OrganizationController');





/*TEST ROUTES*/
Route::get('/test/factory','Organization\TestController@factory');
Route::get('/test','Organization\TestController@run');
Route::post('/test','Organization\TestController@store')->name('test');

Route::get('api/test','Organization\TestController@api');

Route::get('delete/{user}','Admin\UserController@delete');
