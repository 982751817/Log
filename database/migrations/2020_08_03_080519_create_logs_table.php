<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adminId')->comment('管理员id称');
            $table->string('method',5)->comment('请求的类型');
            $table->string('uri',50)->comment('管理员操作uri');
            $table->ipAddress('ip')->comment('登录ip');
            $table->integer('statusCode')->comment('返回状态码');
            $table->timestamp('operate_time')->useCurrent()->comment('操作时间');
            $table->index('adminId');
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
