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
    return view('main');
});


//show all news (sorted by date)
Route::get('/articles/show', ['uses'=>'ArticlesController@show_all_news', 'as'=>'show_all_articles']);

//show all news (sorted count of likes)
Route::get('/articles/get_by_likes', ['uses'=>'ArticlesController@show_all_news_by_likes', 'as'=>'show_all_articles_by_likes']);

//show articles of news with rubric
Route::get('/articles/show/{rubric}', ['uses'=>'ArticlesController@show_selected_rubricOfNews', 'as'=>'show_articles_with_rubric']);

//show selected article
Route::get('/article/show/{number}', ['uses'=>'ArticlesController@show_article', 'as'=>'show_article']);


//access only for authorized users
Route::group(['middleware' => 'auth'], function () { 
	
	//add article
	Route::match(['get', 'post'], '/article/add', ['uses'=>'ArticlesController@create_article', 'as'=>'add_article']);
	
	//delete article	
	Route::match(['get', 'post'], '/article/delete', ['uses'=>'ArticlesController@delete_article', 'as'=>'delete_article_with_post']);

	//edit article
	Route::get('/article/{number}/update', ['uses'=>'ArticlesController@edit_article_get', 'as'=>'get_update_article'])->where('number', '[0-9]+');
	Route::post('/article/{number}/update', ['uses'=>'ArticlesController@edit_article_post', 'as'=>'post_update_article'])->where('number', '[0-9]+');

	//add like
	Route::match(['get', 'post'], '/article/add_like', ['uses'=>'ArticlesController@add_like', 'as'=>'add_like']);
});


//authorization
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
