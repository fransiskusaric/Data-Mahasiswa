<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeachersModel;
use App\StudentsModel;
use App\ScoresModel;
use App\CoursesModel;
use App\GradesModel;
use App\MajorsModel;
use App\ClassesModel;
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

    public function editstudent($id)
    {
        $student = StudentsModel::where('s_id', $id)->first();
        $grade = GradesModel::all()->sortBy('grade_id');
        $major = MajorsModel::all()->sortBy('major_id');
        $class = ClassesModel::all();
        return view('editstudent', ['student' => $student, 'grade' => $grade, 'major' => $major, 'class' => $class]);
    }

    public function updatestudent(Request $request)
    {
        $student = StudentsModel::where('s_id', $request->s_id)->first();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->birth_date = $request->birth_date;
        $student->phone = $request->phone;
        $student->grade_id = $request->grade_id;
        $student->major_id = $request->major_id;
        $student->classroom = $request->classroom;
        $student->enroll_year = $request->enroll_year;
        $student->grad_year = $request->grad_year;

        // $message = $student->isDirty('classroom');
        // if($student->isDirty('classroom')) {
        //     if($student->isDirty('student_id'))
        //         $id = $student->getOriginal('student_id');
        //     else 
        //         $id = $request->student_id;
        //     DB::table('scores')->where('student_id', $id)->dd();
        //     $course = CoursesModel::where('note', 'all')->get();
        //     $id = $student->student_id;
        //     if($student->grade_id == 1 || $student->grade_id == 2) {
        //         for($i = 22; $i < 27; $i++)
        //             $this->insert($id, $i);
        //     } else if($student->grade_id == 3) {
        //         for($i = 1; $i < 12; $i++)
        //             $this->insert($id, $i);
        //     } else if($student->grade_id == 4) {
        //         for($i = 1; $i < 13; $i++)
        //             $this->insert($id, $i);
        //     } else if($student->grade_id == 5) {
        //         foreach($course as $c)
        //             $this->insert($id, $c->course_id);
        //         $this->insert($id, 12);
        //         if($student->major_id == 1) {
        //             for($i = 13; $i < 16; $i++)
        //                 $this->insert($id, $i);
        //         } else if($student->major_id == 2) {
        //             for($i = 16; $i < 20; $i++) 
        //                 $this->insert($id, $i);
        //         } else if($student->major_id == 3) {
        //             for($i = 20; $i < 22; $i++)
        //                 $this->insert($id, $i);
        //         }
        //     }
        // }

        $student->save();

        // return "<script type='text/javascript'>alert('$message');</script>";
        return redirect('/studentinformation');
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
                    for($i = 22; $i < 27; $i++)
                        $this->insert($id, $i);
                } else if($s->grade_id == 3) {
                    $id = $s->student_id;
                    for($i = 1; $i < 12; $i++)
                        $this->insert($id, $i);
                } else if($s->grade_id == 4) {
                    $id = $s->student_id;
                    for($i = 1; $i < 13; $i++)
                        $this->insert($id, $i);
                } else if($s->grade_id == 5) {
                    $id = $s->student_id;
                    foreach($course as $c)
                        $this->insert($id, $c->course_id);
                    $this->insert($id, 12);
                    if($s->major_id == 1) {
                        for($i = 13; $i < 16; $i++)
                            $this->insert($id, $i);
                    } else if($s->major_id == 2) {
                        for($i = 16; $i < 20; $i++) 
                            $this->insert($id, $i);
                    } else if($s->major_id == 3) {
                        for($i = 20; $i < 22; $i++)
                            $this->insert($id, $i);
                    }
                }
            }
        }

        return redirect()->back();
    }

    function insert($id, $i) {
        $score = new ScoresModel;
        $score->student_id = $id;
        $score->course_id = $i;
        if($this->check($id, $i))
            $score->save();
    }

    function check($id, $course) {
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

    public function editteacher($id)
    {
        $teacher = TeachersModel::where('t_id', $id)->first();
        $course = CoursesModel::all()->sortBy('course_id');

        return view('editteacher', ['teacher' => $teacher, 'course' => $course]);
    }

    public function updateteacher(Request $request)
    {
        $teacher = TeachersModel::where('t_id', $request->t_id)->first();
        $teacher->name = $request->name;
        $teacher->student_id = $request->student_id;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->birth_date = $request->birth_date;
        $teacher->phone = $request->phone;
        $teacher->course_id = $request->course_id;
        $teacher->in_date = $request->in_date;
        $teacher->out_date = $request->out_date;

        $teacher->save();

        return redirect("/teacherinformation");
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
