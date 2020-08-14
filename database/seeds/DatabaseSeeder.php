<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClassesSeeder::class,
            CoursesSeeder::class,
            DaysSeeder::class,
            GradesSeeder::class,
            HoursSeeder::class,
            JurusanSeeder::class,
            MajorsSeeder::class
        ]);
    }
}
