<?php

use Illuminate\Database\Seeder;

class MMajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_Majors')->insert([
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
