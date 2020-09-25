<?php

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Database\Eloquent\Model;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            ['id' => 1, 'name' => '播音与主持艺术'],
            ['id' => 2, 'name' => '表演'],
            ['id' => 3, 'name' => '摄影'],
            ['id' => 4, 'name' => '影视摄影与制作'],
            ['id' => 5, 'name' => '数字媒体艺术'],
            ['id' => 6, 'name' => '广播电视编导']
        ];

        foreach($subject as $item){
            DB::table('subjects')->insert($item);
        }
    }
}
