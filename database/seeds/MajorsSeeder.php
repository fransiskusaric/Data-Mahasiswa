<?php

use Illuminate\Database\Seeder;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'major_id' => '1', 'major' => 'IPA'
            ],
            [
                'major_id' => '2', 'major' => 'IPS'
            ],
            [
                'major_id' => '3', 'major' => 'BAHASA'
            ]
        ]);
    }
}
