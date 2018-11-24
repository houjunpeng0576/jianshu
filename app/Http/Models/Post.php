<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Post extends Base
{
    use Searchable;

    //定义索引里面的type
    public function searchableAs()
    {
        return 'post';
    }

    //定义有哪些字段需要搜索
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    //关联用户
    public function user(){
        return $this->belongsTo('App\Http\Models\User');
    }

    //评论模型
    public function comments(){
        return $this->hasMany('App\Http\Models\Comment')->orderBy('created_at','desc');
    }

    //点赞:和用户进行关联
    public function zan($user_id){
        return $this->hasOne('App\Http\Models\Zan')->where('user_id',$user_id);
    }

    //文章的所有赞
    public function zans(){
        return $this->hasOne(\App\Http\Models\Zan::class);
    }

    //属于某个作者的文章
    public function scopeAuthorBy(Builder $query,$user_id){
        return $query->where('user_id',$user_id);
    }

    //不属于某个专题的文章
    public function scopeTopicNotBy(Builder $query,$topic_id){
        //doesntHave()：第一个参数为关系模型，第二个参数为关系 and或者or，第三个参数为回调
        return $query->doesntHave('postTopic','and',function ($q) use($topic_id){
            $q->where('topic_id',$topic_id);
        });
    }

    //关联PostTopic模型
    public function postTopic(){
        return $this->hasMany(PostTopic::class,'post_id','id');
    }

    //全局scope
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('avaiable',function (Builder $query){
            $query->whereIn('status',[0,1]);
        });
    }
}
