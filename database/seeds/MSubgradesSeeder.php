<?php

use Illuminate\Database\Seeder;

class MSubgrades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_Subgrades')->insert([
            [
                'subgrade_id' => '1'
            ],
            [
                'subgrade_id' => '2'
            ],
            [
                'subgrade_id' => '3'
            ],
            [
                'subgrade_id' => '4'
            ],
            [
                'subgrade_id' => '5'
            ],
            [
                'subgrade_id' => '6'
            ]
        ]);
    }
}
