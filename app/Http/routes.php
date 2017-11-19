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




Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);


//Route::group(['middleware' => 'inicio'], function () {
	

 	Route::get('/', function () { 
        if ( Session::get('usuario') ) {
 		     return view('index'); 
 		}else {
 			return redirect()->route('auth/login');
 		}

 		});

 		Route::resource('cliente', 'ClienteController');
 		Route::resource('programa', 'ProgramaController');
 		Route::resource('ip', 'IpController');
	//Administracion de Usuarios.
	
	
	Route::get('auth/change-password', 'UserController@show');
	Route::post('auth/change-password', ['as' => 'user.change-password', 'uses' => 'UserController@changePassword']);
	
	Route::resource('auth/user', 'UserController');
	Route::resource('auth/role', 'RoleController',   ['except' => ['show']]);
	Route::resource('auth/permission', 'PermissionController');




//});


