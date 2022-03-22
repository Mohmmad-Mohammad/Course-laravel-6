<?php
use Illuminate\Support\Facades\Route;
//Code Terminal
//php artisan serve
//php artisan  make:controller FirstController
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



Route::namespace('Front')->group(function () {

    //all route only access or controller
    Route::get('First', 'FirstController@showAdminName');
    Route::get('users', 'UserController@showAdminName');
    Route::get('Admin', 'SacondController@showstring');
});

Route::group(['namespace' => 'Admin'],function(){

    Route::get('second0','SecondController@showstring0')->middleware('auth');
    Route::get('second1','SecondController@showstring1');
    Route::get('second2','SecondController@showstring2');
    Route::get('second3','SecondController@showstring3');
});

Route::get('login',function(){
return 'Password plasae';
}) -> name('login');

Route::get('user', 'userController@index');


Route::resource('news','NewsController');



Route::get('/','Front\UserController@getindex');

Route::get('loading','Front\UserController@getloading');

Route::get('master','Front\UserController@getmaster');

Route::get('aboutus','Front\UserController@getaboutus');

Route::get('home','Front\UserController@gethome');




Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') -> middleware('verified');