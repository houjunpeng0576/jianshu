<?php

namespace App\Providers;

use App\Http\Models\AdminPermission;
use Illuminate\Auth\Md5EloquentUserProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Http\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        //注册md5的用户验证方式
        \Auth::provider('md5-eloquent', function ($app, $config) {
            return new Md5EloquentUserProvider($app['hash'], $config['model']);
        });

        //注册权限
        $permissions = AdminPermission::all();
        foreach ($permissions as $permission){
            Gate::define($permission->name,function ($user) use($permission) {
                //判断是否有权限
                return $user->hasPermission($permission);
            });
        }

    }
}
