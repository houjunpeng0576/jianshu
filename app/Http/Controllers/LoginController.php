<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected $redirectTo = '/posts';

    use AuthenticatesUsers;
    //登录页面
    public function index(){
        echo phpinfo();
        return view('login.index');
    }

    //登录行为
//    public function login(Login $request){
//        //逻辑
//        $user = $request->only(['email','password']);
//        $is_remember = boolval($request->input('is_remember'));
//
//        if(Auth::attempt($user,$is_remember)){
//            return redirect('/posts');
//        }
//        return redirect()->back()->withErrors('邮箱密码不匹配');
//    }

    //登出行为
//    public function logout(){
//
//    }
}
