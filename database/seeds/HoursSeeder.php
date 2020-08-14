<?php

use Illuminate\Database\Seeder;

class HoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hours')->insert([
            [
                'hour_id' => '1', 'grade_id' => '1', 'hour_from' => '07:45', 'hour_to' => '11:15' //tka senin-kamis
            ],
            [
                'hour_id' => '2', 'grade_id' => '1', 'hour_from' => '07:45', 'hour_to' => '10:30' //tka jumat
            ],
            [
                'hour_id' => '3', 'grade_id' => '2', 'hour_from' => '07:45', 'hour_to' => '11:15' //tkb senin-kamis
            ],
            [
                'hour_id' => '4', 'grade_id' => '2', 'hour_from' => '07:45', 'hour_to' => '10:30' //tkb jumat
            ],
            [
                'hour_id' => '5', 'grade_id' => '3', 'hour_from' => '07:00', 'hour_to' => '08:45' 
            ],
            [
                'hour_id' => '6', 'grade_id' => '3', 'hour_from' => '09:00', 'hour_to' => '10:45' //sd sabtu
            ],
            [
                'hour_id' => '7', 'grade_id' => '3', 'hour_from' => '11:00', 'hour_to' => '12:45' //sd senin-kamis
            ],
            [
                'hour_id' => '8', 'grade_id' => '3', 'hour_from' => '11:00', 'hour_to' => '11:55' //sd jumat
            ],
            [
                'hour_id' => '9', 'grade_id' => '4', 'hour_from' => '07:00', 'hour_to' => '08:45' 
            ],
            [
                'hour_id' => '10', 'grade_id' => '4', 'hour_from' => '09:00', 'hour_to' => '10:45' //smp sabtu
            ],
            [
                'hour_id' => '11', 'grade_id' => '4', 'hour_from' => '11:00', 'hour_to' => '12:45' //smp senin-kamis
            ],
            [
                'hour_id' => '12', 'grade_id' => '4', 'hour_from' => '11:00', 'hour_to' => '11:55' //smp jumat
            ],
            [
                'hour_id' => '13', 'grade_id' => '5', 'hour_from' => '07:00', 'hour_to' => '08:25' 
            ],
            [
                'hour_id' => '14', 'grade_id' => '5', 'hour_from' => '08:40', 'hour_to' => '10:05' //sma sabtu
            ],
            [
                'hour_id' => '15', 'grade_id' => '5', 'hour_from' => '10:20', 'hour_to' => '11:45'
            ],
            [
                'hour_id' => '16', 'grade_id' => '5', 'hour_from' => '12:00', 'hour_to' => '13:25' //sma senin-jumat
            ]
        ]);
    }
}
