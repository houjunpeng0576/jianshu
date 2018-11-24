<?php
Route::group(['prefix' => 'admin'],function (){
    //登录页面
    Route::get('/login','\App\Http\Admin\Controllers\LoginController@index');
    //登录行为
    Route::post('/login','\App\Http\Admin\Controllers\LoginController@login');
    //登出行为
    Route::get('/logout','\App\Http\Admin\Controllers\LoginController@logout');

    //用户认证中间件
    Route::group(['middleware' => 'auth:admin'],function (){
        //首页
        Route::get('/index','\App\Http\Admin\Controllers\IndexController@index');

        //管理人员模块
        Route::group(['middleware' => 'can:system'],function (){
            //管理人员展示
            Route::get('/users','\App\Http\Admin\Controllers\UserController@index');
            //管理人员创建页面
            Route::get('/users/create','\App\Http\Admin\Controllers\UserController@create');
            //管理人员创建行为
            Route::post('/users/create','\App\Http\Admin\Controllers\UserController@store');
            //管理人员角色页面
            Route::get('/users/{user}/role','\App\Http\Admin\Controllers\UserController@role');
            //管理人员赋予角色行为
            Route::post('/users/{user}/role','\App\Http\Admin\Controllers\UserController@storeRole');

            //角色展示
            Route::get('/roles','\App\Http\Admin\Controllers\RoleController@index');
            //角色创建页面
            Route::get('/roles/create','\App\Http\Admin\Controllers\RoleController@create');
            //角色创建行为
            Route::post('/roles/create','\App\Http\Admin\Controllers\RoleController@store');
            //角色权限页面
            Route::get('/roles/{role}/permission','\App\Http\Admin\Controllers\RoleController@permission');
            //角色赋予权限行为
            Route::post('/roles/{role}/permission','\App\Http\Admin\Controllers\RoleController@storePermission');

            //权限展示
            Route::get('/permissions','\App\Http\Admin\Controllers\PermissionController@index');
            //权限创建页面
            Route::get('/permissions/create','\App\Http\Admin\Controllers\PermissionController@create');
            //权限创建行为
            Route::post('/permissions/create','\App\Http\Admin\Controllers\PermissionController@store');
        });


        //文章模块
        Route::group(['middleware' => 'can:system'],function (){
            //管理文章展示
            Route::get('/posts','\App\Http\Admin\Controllers\PostController@index');
            //管理文章行为
            Route::post('/posts/{post}/status','\App\Http\Admin\Controllers\PostController@status');
        });

        //专题模块
        Route::group(['middleware' => 'can:topic'],function (){
            //只用resourse中的其中几个方法
            Route::resource('topics','\App\Http\Admin\Controllers\TopicController',['only' => ['index','create','store','destroy']]);
        });

        //通知模块
        Route::group(['middleware' => 'can:notice'],function (){
            //只用resourse中的其中几个方法
            Route::resource('notices','\App\Http\Admin\Controllers\NoticeController',['only' => ['index','create','store']]);
        });
    });
});