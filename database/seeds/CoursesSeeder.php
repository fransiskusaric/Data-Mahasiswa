<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'course_id' => '1', 'course' => 'Matematika', 'note' => 'all'
            ],
            [
                'course_id' => '2', 'course' => 'IPA', 'note' => 'below'
            ],
            [
                'course_id' => '3', 'course' => 'Bahasa Indonesia', 'note' => 'all'
            ],
            [
                'course_id' => '4', 'course' => 'Bahasa Inggris', 'note' => 'all'
            ],
            [
                'course_id' => '5', 'course' => 'IPS', 'note' => 'below'
            ],
            [
                'course_id' => '6', 'course' => 'Pendidikan Kewarganegaraan', 'note' => 'all'
            ],
            [
                'course_id' => '7', 'course' => 'Agama', 'note' => 'all'
            ],
            [
                'course_id' => '8', 'course' => 'Penjasorkes', 'note' => 'all'
            ],
            [
                'course_id' => '9', 'course' => 'TIK', 'note' => 'all'
            ],
            [
                'course_id' => '10', 'course' => 'Muatan Lokal', 'note' => 'all'
            ],
            [
                'course_id' => '11', 'course' => 'Pendidikan Budi Pekerti', 'note' => 'below'
            ],
            [
                'course_id' => '12', 'course' => 'Seni Budaya', 'note' => 'above'
            ],
            [
                'course_id' => '13', 'course' => 'Fisika', 'note' => 'ipa'
            ],
            [
                'course_id' => '14', 'course' => 'Biologi', 'note' => 'ipa'
            ],
            [
                'course_id' => '15', 'course' => 'Kimia', 'note' => 'ipa'
            ],
            [
                'course_id' => '16', 'course' => 'Ekonomi', 'note' => 'ips'
            ],
            [
                'course_id' => '17', 'course' => 'Sejarah', 'note' => 'ips'
            ],
            [
                'course_id' => '18', 'course' => 'Geografi', 'note' => 'ips'
            ],
            [
                'course_id' => '19', 'course' => 'Sosiologi', 'note' => 'ips'
            ],
            [
                'course_id' => '20', 'course' => 'Bahasa Mandarin', 'note' => 'bahasa'
            ],
            [
                'course_id' => '21', 'course' => 'Bahasa Prancis', 'note' => 'bahasa'
            ],
            [
                'course_id' => '22', 'course' => 'Berhitung', 'note' => 'tk'
            ],
            [
                'course_id' => '23', 'course' => 'Kosa Kata Bahasa Indonesia', 'note' => 'tk'
            ],
            [
                'course_id' => '24', 'course' => 'Bahasa Inggris', 'note' => 'tk'
            ],
            [
                'course_id' => '25', 'course' => 'Motorik Halus', 'note' => 'tk'
            ],
            [
                'course_id' => '26', 'course' => 'Menyelesaikan Masalah', 'note' => 'tk'
            ]
        ]);
    }
}
