<?php

namespace App\Http\Models;

class Comment extends Base
{
    //评论所属文章关联
    public function post(){
        return $this->belongsTo('App\Http\Models\Post');
    }

    //评论所属用户
    public function user(){
        return $this->belongsTo('App\Http\Models\User');
    }
}
