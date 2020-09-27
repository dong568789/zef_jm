<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->comment="网站标题";
            $table->string('keywords')->comment="关键字";
            $table->string('description')->comment="关键字";
            $table->unsignedInteger('logo')->default(0)->comment = '网站logo';
            $table->string('tel')->comment = '电话';
            $table->string('qq')->comment = '客服QQ';
            $table->unsignedInteger('wechat')->default(0)->comment = '二维码';
            $table->unsignedInteger('number')->comment = '备案号';
            $table->unsignedInteger('address')->comment = '地址';
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
        Schema::dropIfExists('sites');
    }
}
