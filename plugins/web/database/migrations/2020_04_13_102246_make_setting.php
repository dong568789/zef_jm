<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSetting extends Migration
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
            \DB::table('web_settings')->truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            \Plugins\Web\App\WebSetting::forceCreate([
                'id' => 1,
                'title' => '天眼舆情监控系统',
            ]);
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
