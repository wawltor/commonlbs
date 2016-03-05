<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/login',function(){
	return View::make('login');

});

Route::get('/loginAuth','admin\LoginController@loginAuth');

Route::get('/login_suc',function(){
	//返回一个正确的页面
	return View::make('admin/login_suc');
});

Route::get('/admin/main',function(){
	return View::make('manage/com_watch');

});

Route::get('/manage/findAllComevent','manage\ComeventController@getALLComevent');
Route::get('/manage/updateComevent','manage\ComeventController@updateComevent');
//Route::post('/manage/updateComevent','manage\ComeventController@updateComevent');