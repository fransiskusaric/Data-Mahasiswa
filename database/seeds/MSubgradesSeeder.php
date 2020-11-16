<?php

use Illuminate\Database\Seeder;

class MSubgradesSeeder extends Seeder
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
                'subgrade_id' => '1', 'subgrade' => 'A'
            ],
            [
                'subgrade_id' => '2', 'subgrade' => 'B'
            ],
            [
                'subgrade_id' => '3', 'subgrade' => '1'
            ],
            [
                'subgrade_id' => '4', 'subgrade' => '2'
            ],
            [
                'subgrade_id' => '5', 'subgrade' => '3'
            ],
            [
                'subgrade_id' => '6', 'subgrade' => '4'
            ],
            [
                'subgrade_id' => '7', 'subgrade' => '5'
            ],
            [
                'subgrade_id' => '8', 'subgrade' => '6'
            ],
            [
                'subgrade_id' => '9', 'subgrade' => '7'
            ],
            [
                'subgrade_id' => '10', 'subgrade' => '8'
            ],
            [
                'subgrade_id' => '11', 'subgrade' => '9'
            ],
            [
                'subgrade_id' => '12', 'subgrade' => '10'
            ],
            [
                'subgrade_id' => '13', 'subgrade' => '11'
            ],
            [
                'subgrade_id' => '14', 'subgrade' => '12'
            ]
        ]);
    }
}
