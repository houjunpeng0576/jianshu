<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as AuthUser;
class AdminUser extends AuthUser
{
    protected $guarded = [];

    //用户有哪些角色，并使用withPivot湖区中间表的字段
    public function roles(){
        return $this->belongsToMany(\App\Http\Models\AdminRole::class,'admin_role_user','user_id','role_id')->withPivot(['user_id','role_id']);
    }

    //判断用户是否有某个角色，某些角色。使用集合的intersect交集
    public function isInRoles($roles){
        return !!$roles->intersect($this->roles)->count();
    }

    //给用户分配角色
    public function assignRole($role){
        return $this->roles()->save($role);
    }

    //取消用户分配的角色
    public function deleteRole($role){
        return $this->roles()->detach($role);
    }

    //用户是否有权限
    public function hasPermission($permission){
        return $this->isInRoles($permission->roles);
    }
}
