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

//admin
Route::get('admin', function () {
    return view('admin');
});

Route::get('/love', function () {
    return view('love');
});

//登录 退出
Route::resource('admin_login', 'Admin\LoginController');
Route::get('admin_logout', 'Admin\LoginController@logout');

Route::group(['middleware' => 'admin_auth'], function () {
    // 后台首页
    Route::get('bbb', function () {
        return view('admin.home')->with(['action'=>'控制台','module'=>'陆宝的家']);
    });
    // 微信消息管理
    Route::get('wechat/msg', function () {
        return view('admin.msg')->with(['action'=>'微信消息管理','module'=>'微信消息管理']);
    });
    Route::post('wechat/getMsg', 'Admin\MsgController@index');
});


Route::get('/',function(){
   return view('home.index');
});
//记录
Route::get('clock',function(){
    return view('home.clock');
});
//提交记录
Route::post('clock','Home\ClockController@create');


Route::get('vue',function(){
    return view('home.mint');
});









Route::any('/wechat', 'WechatController@serve');

Route::get('/test', 'WechatController@test');

//妹子图地址
//Route::get('/menu', 'WechatController@menu');
Route::get('/imgs', function(){
    return view('img.img');
});
Route::get('/list', 'WechatController@imgList');
Route::get('/mzitu/{id}', 'WechatController@imgInfo');
Route::get('/info/{id}', 'WechatController@getImg');

//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


