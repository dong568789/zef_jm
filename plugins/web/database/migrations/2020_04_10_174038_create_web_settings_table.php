<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name")->comment="网站名称";
            $table->string("title")->comment="Title";
            $table->string("keyword")->nullable()->comment="关键字";
            $table->string("description")->nullable()->comment="描述";
            $table->string("icp")->nullable()->comment="备案号";
            $table->string('qq')->nullable()->comment="QQ";
            $table->string('wechat')->nullable()->comment="微信号";
            $table->integer('wechat_qr')->nullable(0)->comment="wechat code";
            $table->string("phone")->nullable()->comment="手机号";
            $table->string('tel')->nullable()->comment="电话/座机";
            $table->string('address')->nullable()->comment="地址";
            $table->integer('logo')->nullable(0)->comment="logo";

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
        Schema::dropIfExists('web_settings');
    }
}
