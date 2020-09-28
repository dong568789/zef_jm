<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment="标题";
            $table->unsignedInteger('site')->default(0)->index()->comment="分类id";
            $table->string("description",'500')->nullable()->comment="描述";
            $table->integer('sort')->default(99)->comment="排序";
            $table->unsignedInteger('recommend')->default(102)->comment="推荐";
            $table->unsignedInteger('avatar_aid')->nullable()->index()->comment="图片id";
            $table->string('source',50)->comment="来源";
            $table->unsignedInteger('article_status')->comment="状态";
            $table->integer('click')->default(0)->comment="点击量";

            $table->timestamps();
        });

        Schema::create('article_extras', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique()->primary()->comment="文章id";;
            $table->text('content')->nullable()->comment="文章内容";

            $table->foreign('id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
