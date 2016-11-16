<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
  //return view('home');
//});
Route::resource('/', 'HomeController');
Route::resource('news', 'NewsController');
Route::resource('leagues', 'LeaguesController');
Route::resource('players', 'PlayersController');
Route::resource('teams', 'TeamsController');
Route::resource('matche', 'MatcheController');
Route::resource('aboutus', 'AboutUsController');
Route::resource('tables', 'TablesController');
Route::resource('dashboard', 'DashboardController');
Route::resource('test','TestController');
Route::resource('nice', 'NiceController');
Route::resource('teams', 'TeamsController');
Route::post('comments/{article_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('articles/{slug}',['as'=>'news.single','uses'=>'NewsController@getSingle']);
Route::resource('game', 'GameController');
Auth::routes();
Route::resource('/home', 'HomeController');
//midlw ware route
route::group(['middleware' => ['web']], function(){
Route::get('news/{slug}',['as'=>'news.single','uses'=>'NewsController@getSingle']);
//->where('slug','[\w\d\-\_]+');
    Route::resource('teams', 'TeamsController');
    Route::resource('news', 'NewsController');
    Route::resource('leagues', 'LeaguesController');
    Route::resource('players', 'PlayersController');
    Route::resource('teams', 'TeamsController');
    Route::resource('matche', 'MatcheController');
    Route::resource('aboutus', 'AboutUsController');
    Route::resource('tables', 'TablesController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('test', 'TestController');
    Route::resource('nice', 'NiceController');
    Route::resource('/home', 'HomeController');
    Route::resource('game', 'GameController');
    Route::post('comments/{article_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    // Auth::routes();
    //Route::resource('/home', 'HomeController@index');
});

