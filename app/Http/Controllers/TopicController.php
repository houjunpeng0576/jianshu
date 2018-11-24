<?php

namespace App\Http\Controllers;

use App\Http\Models\Post;
use App\Http\Models\PostTopic;
use App\Http\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //专题展示
    public function show(Topic $topic){
        //带文章数的专题信息
        $topic = Topic::withCount('postTopics')->find($topic->id);

        //专题下的文章列表，按照创建时间倒序排列10个
        $posts = $topic->posts()->orderBy('created_at','desc')->take(10)->get();

        //属于用户的文章，但是未投稿
        $myPosts = Post::authorBy(\Auth::id())->orderBy('created_at','desc')->topicNotBy($topic->id)->get();

        return view('topic.show',compact(['topic','posts','myPosts']));
    }

    public function submit(Topic $topic){
        $this->validate(request(),[
            'post_ids' => 'required|array'
        ]);

        $post_ids = \request('post_ids');

        $topic_id = $topic->id;

        foreach ($post_ids as $post_id){
            PostTopic::firstOrCreate(compact('topic_id','post_id'));
        }

        return back();
    }
}
