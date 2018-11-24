<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //通知表
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50)->default('')->comment('通知标题');
            $table->string('content',1000)->default('')->comment('文章内容');
            $table->timestamps();
        });

        //通知关系表
        Schema::create('user_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notice_id',false,true)->default(0)->comment('通知id');
            $table->integer('user_id',false,true)->default(0)->comment('用户id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
        Schema::dropIfExists('user_notice');
    }
}
