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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', array('as' => '/','uses' => 'ChartsController@chartindex'));
Route::post('/charts', array('as' => 'charts','uses' => 'ChartsController@postPayment'));
Route::get('/pagination/{id}/{cur_move}/{total_count}', array('uses' => 'ChartsController@pagination'));