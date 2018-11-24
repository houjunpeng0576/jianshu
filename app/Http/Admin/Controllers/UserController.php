<?php
/**
 * Created by PhpStorm.
 * User: sunxitong
 * Date: 2018/5/7
 * Time: 12:11
 */

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminRole;
use App\Http\Models\AdminUser;

class UserController extends Controller
{
    //管理员列表
    public function index(){
        $users = AdminUser::all();
        return view('admin.user.index',compact('users'));
    }

    //管理员创建页面
    public function create(){
        return view('admin.user.create');
    }

    //管理员创建行为
    public function store(AdminUserRequest $request){
        $username = $request->input('username');
        $password = md5($request->input('password'));
        AdminUser::create(compact('username','password'));

        return redirect('/admin/users');
    }

    //用户角色页面
    public function role(AdminUser $user){
        $roles = AdminRole::all();
        $myRoles = $user->roles;

        return view('admin.user.role',compact('user','roles','myRoles'));
    }

    //给用户赋予角色
    public function storeRole(AdminUser $user){
        $this->validate(request(),[
            'role_ids' => 'array',
        ]);

        $roles = AdminRole::findMany(request('role_ids'));
        $myRoles = $user->roles;

        //要增加的
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $addRole){
            $user->assignRole($addRole);
        }

        //要删除的
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $deleteRole){
            $user->deleteRole($deleteRole);
        }

        return back();
    }
}