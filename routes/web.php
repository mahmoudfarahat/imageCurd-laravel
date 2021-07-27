<?php

use Illuminate\Support\Facades\Route;

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





Route::get('students' , 'StudentController@index');

Route::get('add-student' , 'StudentController@addstudent');

Route::post('store' , 'StudentController@store');

Route::get('editstudent/{id}' , 'StudentController@editstudent');

Route::put('update/{id}' , 'StudentController@update');

// Route::get('deletestudent/{id}' , 'StudentController@deletestudent');
Route::delete('deletestudent/{id}' , 'StudentController@deletestudent');
