<?php
namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Notice;
use App\Jobs\SendMessage;

class NoticeController extends Controller
{
    //通知列表页面
    public function index(){
        $notices = Notice::all();
        return view('admin.notice.index',compact('notices'));
    }

    //专题创建页面
    public function create(){
        return view('admin.notice.create');
    }

    //专题保存
    public function store(){
        $this->validate(request(),[
            'title' => 'required|string',
            'content' => 'required'
        ]);


        $notice = Notice::create(['title' => request('title'),'content' => request('content')]);

        //队列发送通知
        $this->dispatch(new SendMessage($notice));

        return redirect('/admin/notices');
    }
}