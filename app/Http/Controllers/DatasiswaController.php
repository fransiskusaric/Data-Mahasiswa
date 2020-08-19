<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeachersModel;
use App\StudentsModel;
use App\ScoresModel;
use App\CoursesModel;
use App\Imports\StudentsImport;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class DatasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswaview');
    }

    // |=================== STUDENTS ===================|
    public function studentpage(Request $request)
    {
        if($request->ajax()) {
            $number = $request->rows;
            $list_student = StudentsModel::with(['grades', 'majors', 'classes'])->paginate($number);
            return view('tablestudent', ['list_student' => $list_student])->render();
        } else {
            $list_student = StudentsModel::with(['grades', 'majors', 'classes'])->paginate(20);

            return view('students', ['list_student' => $list_student]);
        }
    }

    public function fetch_student(Request $request)
    {
        if($request->ajax()) {
            $number = $request->rows;
            $list_student = StudentsModel::with(['grades', 'majors', 'classes'])->paginate($number);
            return view('tablestudent', ['list_student' => $list_student])->render();
        }
    }

    public function importstudents(Request $request)
    {
        $request->validate([
            'Students' => 'required'
        ]);

        Excel::import(new StudentsImport, request()->file('Students'));

        $student = StudentsModel::latest()->get();
        $course = CoursesModel::where('note', 'all')->get();
        if(!empty($student)) {
            foreach($student as $s) {
                if($s->grade_id == 1 || $s->grade_id == 2) {
                    $id = $s->student_id;
                    for($i = 22; $i < 27; $i++) {
                        $score = new ScoresModel;
                        $score->student_id = $id;
                        $score->course_id = $i;
                        if($this->check($id, $i)) {
                            $score->save();
                        }
                    }
                } else if($s->grade_id == 3) {
                    $id = $s->student_id;
                    for($i = 1; $i < 12; $i++) {
                        $score = new ScoresModel;
                        $score->student_id = $id;
                        $score->course_id = $i;
                        if($this->check($id, $i)) {
                            $score->save();
                        }
                    }
                } else if($s->grade_id == 4) {
                    $id = $s->student_id;
                    for($i = 1; $i < 13; $i++) {
                        $score = new ScoresModel;
                        $score->student_id = $id;
                        $score->course_id = $i;
                        if($this->check($id, $i)) {
                            $score->save();
                        }
                    }
                } else if($s->grade_id == 5) {
                    $id = $s->student_id;
                    foreach($course as $c) {
                        $score = new ScoresModel;
                        $score->student_id = $id;
                        $score->course_id = $c->course_id;
                        if($this->check($id, $c->course_id)) {
                            $score->save();
                        }
                    }
                    $score = new ScoresModel;
                    $score->student_id = $id;
                    $score->course_id = 12;
                    if($this->check($id, 12)) {
                        $score->save();
                    }
                    if($s->major_id == 1) {
                        for($i = 13; $i < 16; $i++) {
                            $score = new ScoresModel;
                            $score->student_id = $id;
                            $score->course_id = $i;
                            if($this->check($id, $i)) {
                                $score->save();
                            }
                        }
                    } else if($s->major_id == 2) {
                        for($i = 16; $i < 20; $i++) {
                            $score = new ScoresModel;
                            $score->student_id = $id;
                            $score->course_id = $i;
                            if($this->check($id, $i)) {
                                $score->save();
                            }
                        }
                    } else if($s->major_id == 3) {
                        for($i = 20; $i < 22; $i++) {
                            $score = new ScoresModel;
                            $score->student_id = $id;
                            $score->course_id = $i;
                            if($this->check($id, $i)) {
                                $score->save();
                            }
                        }
                    }
                }
            }
        }

        return redirect()->back();
    }

    function check($id, $course){
        $check = ScoresModel::where('student_id', $id)->get();
        if(!empty($check)) {
            foreach($check as $c) {
                if($c->course_id == $course)
                    return false;
            }
        }
        return true;
    }

    // |=================== TEACHERS ===================|
    public function teacherpage(Request $request)
    {
        if($request->ajax()) {
            $number = $request->rows;
            $list_teacher = TeachersModel::with(['courses'])->paginate($number);
            return view('tableteacher', ['list_teacher' => $list_teacher])->render();
        } else {
            $list_teacher = TeachersModel::with(['courses'])->paginate(20);
            
            return view('teachers', ['list_teacher' => $list_teacher]);
        }
    }

    public function fetch_teacher(Request $request)
    {
        if($request->ajax()) {
            $number = $request->rows;
            $list_teacher = TeachersModel::with(['courses'])->paginate($number);
            return view('tableteacher', ['list_teacher' => $list_teacher])->render();
        }
    }

    public function importteachers(Request $request)
    {
        $request->validate([
            'Teachers' => 'required'
        ]);
        
        Excel::import(new TeachersImport, request()->file('Teachers'));

        return redirect()->back();
    }
}
