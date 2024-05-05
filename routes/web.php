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
//表示用
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
Route::post('/post/{id}/top','PostsController@edit');
//投稿を削除する
Route::get('/post/{id}/top','PostsController@delete');

//プロフィールのURLが押された時にプロフィール画面を表示する
Route::get('/profile','UsersController@profile');
//更新用。アップデートするためのメソッドへ行く
Route::post('/update','UsersController@update');

//検索結果を見る為
Route::get('/search','UsersController@search');
//検索結果を送る為
Route::post('/search','UsersController@search');

//id_newfollowが押されるとコントローラに飛ぶ。長いのでfollowという名前で使うと表記している
//フォローするためのボタン
Route::post('/{id}/new_follow','UsersController@new_follow')->name('follow');
//フォロー解除用のボタン
Route::post('/{id}/un_follow','UsersController@un_follow')->name('un_follow');

//フォローリストに行くためのルーティング
Route::get('/followList','FollowsController@followList');
//フォロワーリストに行くためのルーティング
Route::get('/followerList','FollowsController@followerList');

//アイコンに入っているidを送りユーザープロフィールにいく
Route::get('/{id}/userprofile','UsersController@userprofile')->name('user_profile');
});

//Route::get('/top','UsersController@count');
//Route::get('/top','UsersController@followed_count');
//Route::getなど同じルートを辿って違うメソッドを入れることはだめ。
