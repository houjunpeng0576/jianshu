<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as AuthUser;
class User extends AuthUser
{
    protected $guarded = [];

    //用户的文章
    public function posts(){
        return $this->hasMany(\App\Http\Models\Post::class,'user_id','id');
    }

    //关联Fan模型获取用户粉丝
    public function fans(){
        return $this->hasMany(\App\Http\Models\Fan::class,'star_id','id');
    }

    //用户自己关注的star
    public function stars(){
        return $this->hasMany(\App\Http\Models\Fan::class,'fan_id','id');
    }

    //关注某人
    public function doFun($uid){
        $fan = new Fan();
        $fan->star_id = $uid;

        //向我关注的star里添加一个人
        $this->stars()->save($fan);
    }

    //取消关注
    public function unDoFan($uid){
        $fan = new Fan();
        $fan->star_id = $uid;

        //从我关注的star里删除一个人
        $this->stars()->delete($fan);
    }

    //当前用户是否被某个用户关注
    public function hasFan($uid){
        //从我关注的star里查询一个人
        return $this->fans()->where('fans_id',$uid)->count();
    }

    //当前用户是否关注了某个star
    public function hasStar($uid){
        //从我关注的star里查询一个人
        return $this->stars()->where('star_id',$uid)->count();
    }

    //用户收到的通知列表
    public function notices(){
        return $this->belongsToMany(Notice::class,'user_notice','user_id','notice_id')->withPivot(['user_id','notice_id']);
    }

    //添加通知
    public function addNotice($notice){
        return $this->notices()->save($notice);
    }
}