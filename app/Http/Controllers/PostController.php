<?php

namespace App\Http\Controllers;

use App\Http\Models\Comment;
use App\Http\Models\Zan;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use App\Http\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //列表
    public function index(){
        //模型查找+分页
        $posts = Post::with(['user' => function($query){
            $query->select('id','name');
        }])->orderBy('created_at','desc')->withCount(['comments','zans'])->paginate(6);

        //使用预加载进行优化
        $posts->load('user');

        //compact：在变量表中找到posts为变量名的值，如果存在，posts为键名，$posts为值 =》['posts' => $posts]
        return view('post/index',compact('posts'));
    }

    //详情页面
    public function show(Post $post){
        $comments = Comment::with(['user' => function($query){
            $query->select('id','name');
        }])->where('post_id',$post->id)->get();

        return view('post/show',compact('post','comments'));
    }

    //创建页面
    public function create(){
        return view('post/create');
    }

    //创建逻辑
    public function store(StorePost $request){
        $user_id = Auth::id();
        $data = array_merge($request->only(['title','content']),compact('user_id'));
        Post::create($data);
        return redirect('/posts');
    }

    //编辑页面
    public function edit(Post $post){
        return view('post/edit',compact('post'));
    }

    //编辑逻辑
    public function update(StorePost $request,Post $post){
        $this->authorize('update',$post);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect('/posts/'.$post->id);
    }

    //文章删除
    public function delete(Post $post){
        $this->authorize('update',$post);

        $post->delete();

        return redirect('/posts');
    }

    //上传照片
    public function imageUpload(Request $request){
        $path = $request->file('postFile')->storePublicly(date('Y').'/'.date('m').'/'.date('d').'/'.md5(rand(1000,9999).time()));
        return asset('storage'.'/'.$path);
    }

    //评论功能
    public function comment(Post $post){
        //验证
        $this->validate(request(),[
            'content' => 'required|min:3',
        ]);

        //逻辑
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);

        //响应
        return back();
    }

    //点赞
    public function zan(Post $post){
        $zan = new Zan();
        $data = [
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ];
        $zan->firstOrCreate($data);

        return back();
    }

    //点赞
    public function unzan(Post $post){
        $post->zan(Auth::id())->delete();
        return back();
    }

    //搜索结果页
    public function search(){
        //验证
        $this->validate(request(),[
            'query' => 'required'
        ]);

        //逻辑
        $query = request('query');
        $posts = Post::search($query)->paginate(5);

        return view('post.search',compact('posts','query'));
    }
}
