<?php
/**
 * Created by PhpStorm.
 * User: sunxitong
 * Date: 2018/5/7
 * Time: 16:13
 */

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Post;

class PostController extends Controller
{
    //文章管理展示
    public function index(){
        //不实用全局scope查询，只获取status为0的数据
        $posts = Post::withoutGlobalScope('avaiable')->where('status',0)->orderBy('created_at','desc')->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    //文章状态修改
    public function status(Post $post){
        $this->validate(request(),[
            'status' => 'required|in:-1,1'
        ]);

        $post->status = request('status');

        $post->save();

        return [
            'error' => 0,
            'message' => '',
        ];
    }
}