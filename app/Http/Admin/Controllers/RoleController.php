<?php

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminPermission;
use App\Http\Models\AdminRole;

class RoleController extends Controller
{
    //角色展示
    public function index(){
        $roles = AdminRole::paginate(10);
        return view('admin.role.index',compact('roles'));
    }

    //角色创建页面
    public function create(){
        return view('admin.role.create');
    }

    //角色创建行为
    public function store(){
        $this->validate(request(),[
            'name' => 'required|min:3',
            'description' => 'required'
        ]);

        AdminRole::create(request(['name','description']));

        return redirect('/admin/roles');
    }

    //角色权限展示
    public function permission(AdminRole $role){
        //获取所有权限
        $permissions = AdminPermission::all();

        //获取当前角色的权限
        $myPermissions = $role->permissions;

        return view('admin.role.permission',compact('permissions','myPermissions','role'));
    }

    //给角色赋予权限
    public function storePermission(AdminRole $role){
        $this->validate(request(),[
            'permission_ids' => 'array'
        ]);
        //这里必须是findMany
        $permissions = AdminPermission::findMany(request('permission_ids'));

        $rolePermissions = $role->permissions;

        //添加新的权限
        $addPermissions = $permissions->diff($rolePermissions);
        foreach ($addPermissions as $addPermission){
            $role->grantPermission($addPermission);
        }

        //取消权限
        $deletePermissions = $rolePermissions->diff($permissions);
        foreach ($deletePermissions as $deletePermission){
            $role->deletePermission($deletePermission);
        }

        return back();
    }


}