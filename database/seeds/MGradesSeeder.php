<?php

use Illuminate\Database\Seeder;

class MGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_Grades')->insert([
            [
                'grade_id' => '1', 'grade' => 'TK'
            ],
            [
                'grade_id' => '2', 'grade' => 'SD'
            ],
            [
                'grade_id' => '3', 'grade' => 'SMP'
            ],
            [
                'grade_id' => '4', 'grade' => 'SMA'
            ]
        ]);
    }
}
