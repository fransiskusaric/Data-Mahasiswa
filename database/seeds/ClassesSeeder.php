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
        DB::table('Classes')->insert([
            [
                'class_id' => 'tk101', 'grade_id' => '1', 'subgrade_id' => '1', 'classroom' => 'TKA 1', 'major_id' => null, 'teacher_id' => '10226'
            ],
            [
                'class_id' => 'tk102', 'grade_id' => '1', 'subgrade_id' => '1', 'classroom' => 'TKA 2', 'major_id' => null, 'teacher_id' => '11844'
            ],
            [
                'class_id' => 'tk201', 'grade_id' => '1', 'subgrade_id' => '2', 'classroom' => 'TKB 1', 'major_id' => null, 'teacher_id' => '11996'
            ],
            [
                'class_id' => 'tk202', 'grade_id' => '1', 'subgrade_id' => '2', 'classroom' => 'TKB 2', 'major_id' => null, 'teacher_id' => '14513'
            ],
            [
                'class_id' => 'sd101', 'grade_id' => '2', 'subgrade_id' => '1', 'classroom' => '1A', 'major_id' => null, 'teacher_id' => '10112'
            ],
            [
                'class_id' => 'sd102', 'grade_id' => '2', 'subgrade_id' => '1', 'classroom' => '1B', 'major_id' => null, 'teacher_id' => '16583'
            ],
            [
                'class_id' => 'sd103', 'grade_id' => '2', 'subgrade_id' => '1', 'classroom' => '1C', 'major_id' => null, 'teacher_id' => '12419'
            ],
            [
                'class_id' => 'sd104', 'grade_id' => '2', 'subgrade_id' => '1', 'classroom' => '1D', 'major_id' => null, 'teacher_id' => '16411'
            ],
            [
                'class_id' => 'sd201', 'grade_id' => '2', 'subgrade_id' => '2', 'classroom' => '2A', 'major_id' => null, 'teacher_id' => '12547'
            ],
            [
                'class_id' => 'sd202', 'grade_id' => '2', 'subgrade_id' => '2', 'classroom' => '2B', 'major_id' => null, 'teacher_id' => '14267'
            ],
            [
                'class_id' => 'sd203', 'grade_id' => '2', 'subgrade_id' => '2', 'classroom' => '2C', 'major_id' => null, 'teacher_id' => '12521'
            ],
            [
                'class_id' => 'sd204', 'grade_id' => '2', 'subgrade_id' => '2', 'classroom' => '2D', 'major_id' => null, 'teacher_id' => '14699'
            ],
            [
                'class_id' => 'sd301', 'grade_id' => '2', 'subgrade_id' => '3', 'classroom' => '3A', 'major_id' => null, 'teacher_id' => '19804'
            ],
            [
                'class_id' => 'sd302', 'grade_id' => '2', 'subgrade_id' => '3', 'classroom' => '3B', 'major_id' => null, 'teacher_id' => '14144'
            ],
            [
                'class_id' => 'sd303', 'grade_id' => '2', 'subgrade_id' => '3', 'classroom' => '3C', 'major_id' => null, 'teacher_id' => '17495'
            ],
            [
                'class_id' => 'sd304', 'grade_id' => '2', 'subgrade_id' => '3', 'classroom' => '3D', 'major_id' => null, 'teacher_id' => '13339'
            ],
            [
                'class_id' => 'sd401', 'grade_id' => '2', 'subgrade_id' => '4', 'classroom' => '4A', 'major_id' => null, 'teacher_id' => '13258'
            ],
            [
                'class_id' => 'sd402', 'grade_id' => '2', 'subgrade_id' => '4', 'classroom' => '4B', 'major_id' => null, 'teacher_id' => '12411'
            ],
            [
                'class_id' => 'sd403', 'grade_id' => '2', 'subgrade_id' => '4', 'classroom' => '4C', 'major_id' => null, 'teacher_id' => '19926'
            ],
            [
                'class_id' => 'sd404', 'grade_id' => '2', 'subgrade_id' => '4', 'classroom' => '4D', 'major_id' => null, 'teacher_id' => '17699'
            ],
            [
                'class_id' => 'sd501', 'grade_id' => '2', 'subgrade_id' => '5', 'classroom' => '5A', 'major_id' => null, 'teacher_id' => '17974'
            ],
            [
                'class_id' => 'sd502', 'grade_id' => '2', 'subgrade_id' => '5', 'classroom' => '5B', 'major_id' => null, 'teacher_id' => '19825'
            ],
            [
                'class_id' => 'sd503', 'grade_id' => '2', 'subgrade_id' => '5', 'classroom' => '5C', 'major_id' => null, 'teacher_id' => '11718'
            ],
            [
                'class_id' => 'sd504', 'grade_id' => '2', 'subgrade_id' => '5', 'classroom' => '5D', 'major_id' => null, 'teacher_id' => '17520'
            ],
            [
                'class_id' => 'sd601', 'grade_id' => '2', 'subgrade_id' => '6', 'classroom' => '6A', 'major_id' => null, 'teacher_id' => '11643'
            ],
            [
                'class_id' => 'sd602', 'grade_id' => '2', 'subgrade_id' => '6', 'classroom' => '6B', 'major_id' => null, 'teacher_id' => '13111'
            ],
            [
                'class_id' => 'sd603', 'grade_id' => '2', 'subgrade_id' => '6', 'classroom' => '6C', 'major_id' => null, 'teacher_id' => '16956'
            ],
            [
                'class_id' => 'sd604', 'grade_id' => '2', 'subgrade_id' => '6', 'classroom' => '6D', 'major_id' => null, 'teacher_id' => '11525'
            ],
            [
                'class_id' => 'mp101', 'grade_id' => '3', 'subgrade_id' => '1', 'classroom' => '7A', 'major_id' => null, 'teacher_id' => '15774'
            ],
            [
                'class_id' => 'mp102', 'grade_id' => '3', 'subgrade_id' => '1', 'classroom' => '7B', 'major_id' => null, 'teacher_id' => '14155'
            ],
            [
                'class_id' => 'mp103', 'grade_id' => '3', 'subgrade_id' => '1', 'classroom' => '7C', 'major_id' => null, 'teacher_id' => '13636'
            ],
            [
                'class_id' => 'mp201', 'grade_id' => '3', 'subgrade_id' => '2', 'classroom' => '8A', 'major_id' => null, 'teacher_id' => '14038'
            ],
            [
                'class_id' => 'mp202', 'grade_id' => '3', 'subgrade_id' => '2', 'classroom' => '8B', 'major_id' => null, 'teacher_id' => '17319'
            ],
            [
                'class_id' => 'mp203', 'grade_id' => '3', 'subgrade_id' => '2', 'classroom' => '8C', 'major_id' => null, 'teacher_id' => '11924'
            ],
            [
                'class_id' => 'mp301', 'grade_id' => '3', 'subgrade_id' => '3', 'classroom' => '9A', 'major_id' => null, 'teacher_id' => '10115'
            ],
            [
                'class_id' => 'mp302', 'grade_id' => '3', 'subgrade_id' => '3', 'classroom' => '9B', 'major_id' => null, 'teacher_id' => '14050'
            ],
            [
                'class_id' => 'mp303', 'grade_id' => '3', 'subgrade_id' => '3', 'classroom' => '9C', 'major_id' => null, 'teacher_id' => '19708'
            ],
            [
                'class_id' => 'ma111', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPA 1', 'major_id' => '1', 'teacher_id' => '15496'
            ],
            [
                'class_id' => 'ma112', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPA 2', 'major_id' => '1', 'teacher_id' => '13171'
            ],
            [
                'class_id' => 'ma113', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPA 3', 'major_id' => '1', 'teacher_id' => '19782'
            ],
            [
                'class_id' => 'ma121', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPS 1', 'major_id' => '2', 'teacher_id' => '18902'
            ],
            [
                'class_id' => 'ma122', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPS 2', 'major_id' => '2', 'teacher_id' => '19475'
            ],
            [
                'class_id' => 'ma123', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X IPS 3', 'major_id' => '2', 'teacher_id' => '10706'
            ],
            [
                'class_id' => 'ma131', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X BAHASA 1', 'major_id' => '3', 'teacher_id' => '14032'
            ],
            [
                'class_id' => 'ma132', 'grade_id' => '4', 'subgrade_id' => '1', 'classroom' => 'X BAHASA 2', 'major_id' => '3', 'teacher_id' => '18520'
            ],
            [
                'class_id' => 'ma211', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI IPA 1', 'major_id' => '1', 'teacher_id' => '11252'
            ],
            [
                'class_id' => 'ma212', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI IPA 2', 'major_id' => '1', 'teacher_id' => '17506'
            ],
            [
                'class_id' => 'ma221', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI IPS 1', 'major_id' => '2', 'teacher_id' => '14708'
            ],
            [
                'class_id' => 'ma222', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI IPS 2', 'major_id' => '2', 'teacher_id' => '13191'
            ],
            [
                'class_id' => 'ma231', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI BAHASA 1', 'major_id' => '3', 'teacher_id' => '14752'
            ],
            [
                'class_id' => 'ma232', 'grade_id' => '4', 'subgrade_id' => '2', 'classroom' => 'XI BAHASA 2', 'major_id' => '3', 'teacher_id' => '17428'
            ],
            [
                'class_id' => 'ma311', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII IPA 1', 'major_id' => '1', 'teacher_id' => '17301'
            ],
            [
                'class_id' => 'ma312', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII IPA 2', 'major_id' => '1', 'teacher_id' => '18427'
            ],
            [
                'class_id' => 'ma321', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII IPS 1', 'major_id' => '2', 'teacher_id' => '15760'
            ],
            [
                'class_id' => 'ma322', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII IPS 2', 'major_id' => '2', 'teacher_id' => '11686'
            ],
            [
                'class_id' => 'ma331', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII BAHASA 1', 'major_id' => '3', 'teacher_id' => '19580'
            ],
            [
                'class_id' => 'ma332', 'grade_id' => '4', 'subgrade_id' => '3', 'classroom' => 'XII BAHASA 2', 'major_id' => '3', 'teacher_id' => '13054'
            ],
        ]);
    }
}
