<?php

namespace App\Providers;

use App\Http\Models\Topic;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Laravel5.4之后，string默认字符编码是 mb4string，这个是4个字节对应一个字符，所以这里的191是(767/4)的近似值
        Schema::defaultStringLength(191);

        //对公共模版layout.sidebar进行数据注入
        \View::composer('layout.sidebar',function ($view){
            //获取专题数据
            $topics = Topic::all();
            $view->with(compact('topics'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
