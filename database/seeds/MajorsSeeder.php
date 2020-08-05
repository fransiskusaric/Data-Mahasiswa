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
                'major_id' => '1', 'majors' => 'IPA'
            ],
            [
                'major_id' => '2', 'majors' => 'IPS'
            ],
            [
                'major_id' => '3', 'majors' => 'BAHASA'
            ]
        ]);
    }
}
