<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    //课表页面
    public function index(){
        //获取当前用户
        $user = Auth::user();

        //获取用户通知
        $notices = $user->notices;

        return view('notice.index',compact('notices'));
    }
}