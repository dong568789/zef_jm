<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment="Title";
            $table->string('name')->comment="别名";
            $table->unsignedInteger('pid')->index()->default(0)->comment="Parent Id";
            $table->unsignedInteger('cover_id')->default(0)->comment="";
            $table->string('seo_title')->nullable()->comment = '';
            $table->string('seo_keyword')->nullable()->comment = '';
            $table->string('seo_description')->nullable()->comment = '';
            $table->json('extra')->nullable()->comment = '扩展数据';
            $table->unsignedInteger('level')->index()->default(0)->comment = 'tree level';
            $table->text('path')->nullable()->comment = 'tree path';
            $table->unsignedInteger('order_index')->default(0)->index()->comment = 'tree order';
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
