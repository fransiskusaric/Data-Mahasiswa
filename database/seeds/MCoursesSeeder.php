<?php

use Illuminate\Database\Seeder;

class MCourses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_Courses')->insert([
            [
                'course_id' => '1', 'course' => 'Matematika'
            ],
            [
                'course_id' => '2', 'course' => 'IPA'
            ],
            [
                'course_id' => '3', 'course' => 'Bahasa Indonesia'
            ],
            [
                'course_id' => '4', 'course' => 'Bahasa Inggris'
            ],
            [
                'course_id' => '5', 'course' => 'IPS'
            ],
            [
                'course_id' => '6', 'course' => 'Pendidikan Kewarganegaraan'
            ],
            [
                'course_id' => '7', 'course' => 'Agama'
            ],
            [
                'course_id' => '8', 'course' => 'Penjasorkes'
            ],
            [
                'course_id' => '9', 'course' => 'TIK'
            ],
            [
                'course_id' => '10', 'course' => 'Muatan Lokal'
            ],
            [
                'course_id' => '11', 'course' => 'Pendidikan Budi Pekerti'
            ],
            [
                'course_id' => '12', 'course' => 'Seni Budaya'
            ],
            [
                'course_id' => '13', 'course' => 'Fisika'
            ],
            [
                'course_id' => '14', 'course' => 'Biologi'
            ],
            [
                'course_id' => '15', 'course' => 'Kimia'
            ],
            [
                'course_id' => '16', 'course' => 'Ekonomi'
            ],
            [
                'course_id' => '17', 'course' => 'Sejarah'
            ],
            [
                'course_id' => '18', 'course' => 'Geografi'
            ],
            [
                'course_id' => '19', 'course' => 'Sosiologi'
            ],
            [
                'course_id' => '20', 'course' => 'Bahasa Mandarin'
            ],
            [
                'course_id' => '21', 'course' => 'Bahasa Prancis'
            ],
            [
                'course_id' => '22', 'course' => 'Berhitung'
            ],
            [
                'course_id' => '23', 'course' => 'Kosa Kata Bahasa Indonesia'
            ],
            [
                'course_id' => '24', 'course' => 'Motorik Halus'
            ],
            [
                'course_id' => '25', 'course' => 'Menyelesaikan Masalah'
            ]
        ]);
    }
}
