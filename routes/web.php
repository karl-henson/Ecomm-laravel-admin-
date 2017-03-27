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
use Illuminate\Http\Request;
use Illuminate\Http\Response;






Route::match(['get', 'post'], '/', 	['as' => 'home', function(){
	if(Auth::check()){
		return redirect()->route('landing');
	}
	return redirect('login');
}]);



Route::get('/login',				['as' => 'login', function(){
	return view('login',['data'=> array('error'=>'no')]);
}]);




Route::post('/login',		['as' => 'login',		'uses' =>'LoginController@login']);


Route::get('/logout',		['as' => 'logout',		'middleware' => 'auth',		'uses' =>'LoginController@logout']);


Route::get('/landing',		['as' => 'landing',		'middleware' => 'auth',		'uses' =>'LandingController@landing']);


Route::get('/users',		['as' => 'users',		'middleware' => 'auth',		'uses' =>'LandingController@users']);


Route::get('/persons',		['as' => 'persons',		'middleware' => 'auth',		'uses' =>'LandingController@persons']);


Route::get('/sites',		['as' => 'sites',		'middleware' => 'auth',		'uses' =>'LandingController@sites']);


Route::get('/equip',		['as' => 'equip',		'middleware' => 'auth',		'uses' =>'LandingController@equip']);


Route::get('/emails',		['as' => 'emails',		'middleware' => 'auth',		'uses' =>'LandingController@emails']);


Route::post('/functions',	['as' => 'functions',	'middleware' => 'auth',		'uses' =>'FunctionsController@HandleFunction']);






