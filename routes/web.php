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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');

//ログイン中のページ
//groupメソッドでmiddlewareのauthをこれ以下に適用できるようになる。
Route::group(['middleware'=> 'auth'], function(){

//投稿を見る為
Route::get('/top','PostsController@index')->name('post_view');
//投稿を送る為
Route::post('/top','PostsController@create')->name('new_post');
//投稿を編集する
Route::get('/post/{id}/top','PostsController@edit');
//投稿を削除する
Route::get('/post/{id}/top','PostsController@delete');

Route::get('/profile','UsersController@profile');

//検索結果を見る為
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');
//検索結果を送る為
//id_newfollowが押されるとコントローラに飛ぶ。長いのでfollowという名前で使うと表記している
Route::post('/{id}/new_follow','UsersController@new_follow')->name('follow');
//フォローするためのボタン
Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

});
