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


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['middleware' => 'auth'] , function() {
	
	Route::get('home', function() {
		$user = Auth::user();
		return view('home', ['user' => $user]);
	});

	/**
	*	Request to Save and Execute the code
	*/
	Route::post('home', 'CodeController@saveAndExec');

	Route::get('/codes', function() {
		$user = Auth::user();
		if ($user->role != 'Moderator') {
			return Redirect::to('/home');
		}

		$codes = App\Code::all();
		return view('codes', ['codes' => $codes]);
	});

	Route::get('/codes/{user_id}', function($user_id) {
		$user = Auth::user();
		if ($user->role != 'Moderator') {
			return Redirect::to('/home');
		}

		$code = App\Code::where('user_id', '=', $user_id)->first();
		return view('code', ['code' => $code->code]);
	});

    
});