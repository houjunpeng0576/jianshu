<?php

namespace App\Http\Models;

class Topic extends Base
{
    //获取专题下的文章
    public function posts(){
        //这里是多对多的关系
        return $this->belongsToMany(Post::class,'post_topic','topic_id','post_id');
    }

    //获取专题下文章数的关联，用于withCount
    public function postTopics(){
        return $this->hasMany(PostTopic::class,'topic_id','id');
    }
}
