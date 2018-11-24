<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsAndRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //角色表
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->default('')->commend('角色名称');
            $table->string('description',100)->default('')->commend('角色介绍');
            $table->timestamps();
        });

        //权限表
        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->default('')->commend('权限名称');
            $table->string('description',100)->default('')->commend('权限介绍');
            $table->timestamps();
        });

        //权限角色
        Schema::create('admin_permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(0)->commend('角色id');
            $table->integer('permission_id')->default(0)->commend('权限id');
            $table->timestamps();
        });

        //用户角色
        Schema::create('admin_role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0)->commend('用户id');
            $table->integer('role_id')->default(0)->commend('角色id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_permissions');
        Schema::dropIfExists('admin_permission_role');
        Schema::dropIfExists('admin_role_user');
    }
}