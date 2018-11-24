<?php
namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminPermission;

class PermissionController extends Controller
{
    //权限展示页面
    public function index(){
        $permissions = AdminPermission::paginate(10);
        return view('admin.permission.index',compact('permissions'));
    }

    //权限创建页面
    public function create(){
        return view('admin.permission.create');
    }

    //权限创建行为
    public function store(AdminPermission $permission){
        $this->validate(request(),[
            'name' => 'required|min:3',
            'description' => 'required'
        ]);

        AdminPermission::create(request(['name','description']));

        return redirect('/admin/permissions');
    }
}