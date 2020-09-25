<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::transaction(function() {
            \Illuminate\Database\Eloquent\Model::unguard(true);
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            \DB::table('categories')->truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            \Plugins\Web\App\Category::forceCreate([
                'id' => 1,
                'name' => 'site',
                'title' => '网站栏目',
            ])->forceCreate([
                'id' => 0,
                'name' => '',
                'title' => '无'
            ]);
            \DB::statement("ALTER TABLE `categories` AUTO_INCREMENT = 2;");
            \DB::statement("UPDATE `categories` SET `path` = '/0/', `id` = 0 WHERE `id` = 2;");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
