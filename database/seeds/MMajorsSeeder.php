<?php

use Illuminate\Database\Seeder;

class MMajors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('MMajors')->insert([
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
