<?php

use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'room_id' => 'tk101', 'room' => 'TKA 1', 'grade_id' => '1'
            ],
            [
                'room_id' => 'tk102', 'room' => 'TKA 2', 'grade_id' => '1'
            ],
            [
                'room_id' => 'tk201', 'room' => 'TKB 1', 'grade_id' => '2'
            ],
            [
                'room_id' => 'tk202', 'room' => 'TKB 2', 'grade_id' => '2'
            ],
            [
                'room_id' => 'sd101', 'room' => '1A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd102', 'room' => '1B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd103', 'room' => '1C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd104', 'room' => '1D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd201', 'room' => '2A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd202', 'room' => '2B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd203', 'room' => '2C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd204', 'room' => '2D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd301', 'room' => '3A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd302', 'room' => '3B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd303', 'room' => '3C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd304', 'room' => '3D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd401', 'room' => '4A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd402', 'room' => '4B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd403', 'room' => '4C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd404', 'room' => '4D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd501', 'room' => '5A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd502', 'room' => '5B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd503', 'room' => '5C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd504', 'room' => '5D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd601', 'room' => '6A', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd602', 'room' => '6B', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd603', 'room' => '6C', 'grade_id' => '3'
            ],
            [
                'room_id' => 'sd604', 'room' => '6D', 'grade_id' => '3'
            ],
            [
                'room_id' => 'mp101', 'room' => '7A', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp102', 'room' => '7B', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp103', 'room' => '7C', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp201', 'room' => '8A', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp202', 'room' => '8B', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp203', 'room' => '8C', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp301', 'room' => '9A', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp302', 'room' => '9B', 'grade_id' => '4'
            ],
            [
                'room_id' => 'mp303', 'room' => '9C', 'grade_id' => '4'
            ],
            [
                'room_id' => 'ma111', 'room' => 'X IPA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma112', 'room' => 'X IPA 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma113', 'room' => 'X IPA 3', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma121', 'room' => 'X IPS 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma122', 'room' => 'X IPS 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma123', 'room' => 'X IPS 3', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma131', 'room' => 'X BAHASA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma132', 'room' => 'X BAHASA 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma211', 'room' => 'XI IPA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma212', 'room' => 'XI IPA 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma221', 'room' => 'XI IPS 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma222', 'room' => 'XI IPS 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma231', 'room' => 'XI BAHASA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma232', 'room' => 'XI BAHASA 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma311', 'room' => 'XII IPA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma312', 'room' => 'XII IPA 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma321', 'room' => 'XII IPS 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma322', 'room' => 'XII IPS 2', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma331', 'room' => 'XII BAHASA 1', 'grade_id' => '5'
            ],
            [
                'room_id' => 'ma332', 'room' => 'XII BAHASA 2', 'grade_id' => '5'
            ],
        ]);
    }
}
