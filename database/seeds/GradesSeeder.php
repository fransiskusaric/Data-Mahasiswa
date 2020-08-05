<?php

use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'grade_id' => '1', 'grade' => 'TKA'
            ],
            [
                'grade_id' => '2', 'grade' => 'TKB'
            ],
            [
                'grade_id' => '3', 'grade' => 'SD'
            ],
            [
                'grade_id' => '4', 'grade' => 'SMP'
            ],
            [
                'grade_id' => '5', 'grade' => 'SMA'
            ]
        ]);
    }
}
