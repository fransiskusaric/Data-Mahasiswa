<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbjurusan')->insert([
            [
                'idJurusan' => '1',
                'jurusan' => 'Manajemen'
            ],
            [
                'idJurusan' => '2',
                'jurusan' => 'Akuntansi'
            ],
            [
                'idJurusan' => '3',
                'jurusan' => 'Informatika'
            ],
            [
                'idJurusan' => '4',
                'jurusan' => 'Sistem Informasi'
            ],
            [
                'idJurusan' => '5',
                'jurusan' => 'Teknik Komputer'
            ],
            [
                'idJurusan' => '6',
                'jurusan' => 'Ilmu Komunikasi'
            ],
            [
                'idJurusan' => '7',
                'jurusan' => 'Arsitek'
            ],
            [
                'idJurusan' => '8',
                'jurusan' => 'Animasi'
            ],
            [
                'idJurusan' => '9',
                'jurusan' => 'DKV'
            ],
            [
                'idJurusan' => '10',
                'jurusan' => 'FTV (Film)'
            ],
            [
                'idJurusan' => '11',
                'jurusan' => 'Perhotelan'
            ],
            [
                'idJurusan' => '12',
                'jurusan' => 'Jurnalistik'
            ]
        ]);
    }
}
