<?php

use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            [
                'day_id' => '1', 'day_name' => 'Senin'
            ],
            [
                'day_id' => '2', 'day_name' => 'Selasa'
            ],
            [
                'day_id' => '3', 'day_name' => 'Rabu'
            ],
            [
                'day_id' => '4', 'day_name' => 'Kamis'
            ],
            [
                'day_id' => '5', 'day_name' => 'Jumat'
            ],
            [
                'day_id' => '6', 'day_name' => 'Sabtu'
            ]
        ]);
    }
}
