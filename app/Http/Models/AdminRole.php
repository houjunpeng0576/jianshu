<?php

namespace App\Http\Models;

class AdminRole extends Base
{
    protected $table = 'admin_roles';

    //获取当前角色的权限
    public function permissions(){
        return $this->belongsToMany(\App\Http\Models\AdminPermission::class,'admin_permission_role','role_id','permission_id')->withPivot(['permission_id','role_id']);
    }

    //给角色授予权限
    public function grantPermission($permission){
        return $this->permissions()->save($permission);
    }

    //取消角色授予的权限
    public function deletePermission($permission){
        return $this->permissions()->detach($permission);
    }

    //判断角色是否有权限
    public function hasPermission($permission){
        return $this->permissions()->contains($permission);
    }
}
