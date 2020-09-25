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
            $table->bigIncrements('id');
            $table->string('title')->comment="Title";
            $table->integer('cid')->default(0)->index()->comment="category id";
            $table->integer('order')->default(99)->comment="Sort";
            $table->unsignedInteger('cover_id')->default(0)->comment="";
            $table->string('seo_title')->nullable()->comment="seo title";
            $table->string('seo_description')->nullable()->comment="";
            $table->string('jump')->nullable()->comment="jump url";
            $table->unsignedInteger('article_status')->default(0)->comment="Status";
            $table->integer('click')->default(0)->comment="点击量";

            $table->timestamps();
        });

        Schema::create('article_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable()->comment="Content";

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
        Schema::dropIfExists('article_content');
    }
}
