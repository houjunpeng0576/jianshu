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
Route::get('/',function (){
    return 'hello';
});

//注册页面
Route::get('/register','\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register','\App\Http\Controllers\RegisterController@register');

//登录页面
Route::get('/login','\App\Http\Controllers\LoginController@index');
//登录行为
Route::post('/login','\App\Http\Controllers\LoginController@login');
//登出行为
Route::get('/logout','\App\Http\Controllers\LoginController@logout');

//个人设置页面
Route::get('/user/me/setting','\App\Http\Controllers\UserController@setting');
//个人设置操作
Route::post('/user/me/setting','\App\Http\Controllers\UserController@settingStore');

//文章搜索
Route::get('/posts/search','\App\Http\Controllers\PostController@search');

//文章列表页
Route::get('/posts','\App\Http\Controllers\PostController@index')->name('login');
//创建文章
Route::get('/posts/create','\App\Http\Controllers\PostController@create');
Route::post('/posts','\App\Http\Controllers\PostController@store');
//编辑文章
Route::get('/posts/{post}/edit','\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');
//文章删除
Route::get('/posts/{post}/delete','\App\Http\Controllers\PostController@delete');
//文章详情页
Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');
//上传图片
Route::post('/posts/image/upload','\App\Http\Controllers\PostController@imageUpload');

//提交评论
Route::post('/posts/{post}/comment','\App\Http\Controllers\PostController@comment');

//点赞
Route::get('/posts/{post}/zan','\App\Http\Controllers\PostController@zan');
//取消点赞
Route::get('/posts/{post}/unzan','\App\Http\Controllers\PostController@unzan');

//个人中心
Route::get('/user/{user}','\App\Http\Controllers\UserController@show');
//关注某个用户
Route::post('/user/{user}/fun','\App\Http\Controllers\UserController@fun');
//取消关注某个用户
Route::post('/user/{user}/unfun','\App\Http\Controllers\UserController@unfun');

//专题详情页
Route::get('/topic/{topic}','\App\Http\Controllers\TopicController@show');
//投稿
Route::post('/topic/{topic}/submit','\App\Http\Controllers\TopicController@submit');

//通知页面
Route::get('/notices','\App\Http\Controllers\NoticeController@index');

include_once 'admin.php';