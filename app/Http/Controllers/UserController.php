<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //个人设置页面
    public function setting(){
        return view('user.setting');
    }

    //个人设置行为
    public function settingStore(){

    }

    //个人中心展示
    public function show(User $user){
        //1.这个人的信息，包含关注/粉丝/文章数
        $user = User::withCount(['stars','fans','posts'])->find($user->id);

        //2.这个人的文章列表，取创建时间最新的前十条
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();

        //3.这个人关注的用户，包含关注用户的 关注/粉丝/文章数
        $stars = $user->stars;
        //$fans->pluck('fan_id')：从粉丝数据中获取fan_id作为一个数组
        $susers = User::whereIn('id',$stars->pluck('star_id'))->withCount(['stars','fans','posts'])->get();

        //4.这个人的粉丝用户没包含粉丝用户的 关注/粉丝/文章数
        //获取所有的粉丝数据
        $fans = $user->fans;
        //$fans->pluck('fan_id')：从粉丝数据中获取fan_id作为一个数组
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','posts'])->get();

        return view('user/show',compact(['user','posts','susers','fusers']));
    }

    //关注某个用户
    public function fun(User $user){
        $me = Auth::user();
        $me->doFun($user->id);
        return [
            'error' => '0',
            'message' => 'ok',
        ];
    }

    //取消关注某个用户
    public function unfun(User $user){
        $me = Auth::user();
        $me->unDoFan($user->id);
        return [
            'error' => '0',
            'message' => 'ok',
        ];
    }
}
