<?php
namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Topic;

class TopicController extends Controller
{
    //专题列表页面
    public function index(){
        $topics = Topic::all();
        return view('admin.topic.index',compact('topics'));
    }

    //专题创建页面
    public function create(){
        return view('admin.topic.create');
    }

    //专题保存
    public function store(){
        $this->validate(request(),[
            'name' => 'required|string'
        ]);

        Topic::create(['name' => request('name')]);

        return redirect('/admin/topics');
    }

    //专题删除
    public function destroy(Topic $topic){
        $topic->delete();

        return [
            'error' => 0,
            'message' => ''
        ];
    }
}