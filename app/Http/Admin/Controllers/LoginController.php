<?php

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/index';

    use AuthenticatesUsers;
    //登录页面
    public function index(){
        return view('admin.login.index');
    }

    //用户名字段
    public function username()
    {
        return 'username';
    }

    //设置守护
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
