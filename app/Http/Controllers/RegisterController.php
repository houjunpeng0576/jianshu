<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Http\Requests\RegisterStore;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    //注册页面
    public function index(){
        return view('register.index');
    }

    //注册行为
    public function register(RegisterStore $request){
        //逻辑
        $name = $request->input('name');
        $email = $request->input('email');
        $password = md5($request->input('password'));
        User::create(compact('name','email','password'));

        return redirect('/login');
    }
}
