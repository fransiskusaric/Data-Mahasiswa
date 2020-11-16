<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScoresModel;
use App\MCoursesModel;
use App\MGradesModel;
use App\MMajorsModel;
use App\MStudentsModel;
use App\MSubgradesModel;
use App\CourseGradeModel;
use App\ClassesModel;
use App\StudentGradeModel;
use App\StudentSubgradeModel;
use App\StudentClassModel;
use App\StudentScoresModel;
use App\StudentCourseScoreModel;
use App\TeachersModel;
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
            $search = $request->search;
            $list_student = MStudentsModel::where('name', 'LIKE', '%'.$search.'%')->paginate($number);
            return view('tablestudent', ['list_student' => $list_student])->render();
        } else {
            $list_student = MStudentsModel::with('grades')->paginate(20);

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

    public function createstudent()
    {
        $grades = MGradesModel::all();
        $subgrades = MSubgradesModel::all();
        $majors = MMajorsModel::all();
        $classes = ClassesModel::all();
        
        return view('createstudent', ['grade' => $grades, 'subgrade' => $subgrades, 'major' => $majors, 'classes' => $classes]);
    }

    public function savestudent()
    {
        $name = request('name');
        $student_id = request('student_id');
        $address = request('address');
        $city = request('city');
        $birth_date = request('birth_date');
        $phone = request('phone');
        $grade_id = request('grade_id');
        $subgrade_id = request('subgrade_id');
        $classroom_id = request('classroom_id');
        $major_id = request('major_id');
        $enroll_date = request('enroll_date');
        $grad_date = request('grad_date');


        $student = new MStudentsModel();
        $student->name = $name;
        $student->student_id = $student_id;
        $student->address = $address;
        $student->city = $city;
        $student->birth_date = $birth_date;
        $student->phone = $phone;
        $student->save();

        $grade = new StudentGradeModel();
        $grade->student_id = $student_id;
        $grade->grade_id = $grade_id;
        $grade->enroll_date = $enroll_date;
        $grade->grad_date = $grad_date;
        $grade->save();

        $student_grade = StudentGradeModel::orderBy('student_grade_id', 'desc')->first();

        $subgrade = new StudentSubgradeModel();
        $subgrade->student_grade_id = $student_grade->student_grade_id;
        $subgrade->subgrade_id = $subgrade_id;
        $subgrade->save();

        $student_subgrade = StudentSubgradeModel::orderBy('student_subgrade_id', 'desc')->first();

        $classroom = new StudentClassModel();
        $classroom->student_subgrade_id = $student_subgrade->student_subgrade_id;
        $classroom->classroom_id = $classroom_id;
        $classroom->save();

        $student_class = StudentClassModel::orderBy('student_class_id', 'desc')->first();
        if($major_id) {
            $course_grade = CourseGradeModel::where([['grade_id', $grade_id], ['major_id', $major_id]])
                ->orWhere([['grade_id', $grade_id], ['major_id', null]])
                ->get();
        } else {
            $course_grade = CourseGradeModel::where('grade_id', $grade_id)->get();
        }

        foreach($course_grade as $cg) {
            $scores = new StudentScoresModel();
            $scores->student_class_id = $student_class->student_class_id;
            $scores->course_grade_id = $cg->course_grade_id;
            $scores->save();
        } 
        
        return redirect('/studentinformation')->with('success', 'New student added successfully!');
    }

    public function detailstudent($id) {
        $student = MStudentsModel::with(['grades'])->where('s_id', $id)->first();
        return view('detailstudent', ['student' => $student]);
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
    public function importteachers(Request $request)
    {
        $request->validate([
            'Teachers' => 'required'
        ]);
        
        Excel::import(new TeachersImport, request()->file('Teachers'));

        return redirect()->back();
    }

    public function teacherpage(Request $request)
    {
        if($request->ajax()) {
            $number = $request->rows;
            $search = $request->search;
            $list_teacher = TeachersModel::with(['courses'])->where('name', 'LIKE', '%'.$search.'%')->paginate($number);
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
            $search = $request->search;
            $list_teacher = TeachersModel::with(['courses'])->where('name', 'LIKE', '%'.$search.'%')->paginate($number);
            return view('tableteacher', ['list_teacher' => $list_teacher])->render();
        }
    }

    public function editteacher($id)
    {
        $teacher = TeachersModel::where('t_id', $id)->first();
        $course = MCoursesModel::all();
        $grade = MGradesModel::all();

        return view('editteacher', ['teacher' => $teacher, 'course' => $course, 'grade' => $grade]);
    }

    public function updateteacher(Request $request)
    {
        $teacher = TeachersModel::where('t_id', $request->t_id)->first();
        $teacher->name = $request->name;
        $teacher->teacher_id = $request->teacher_id;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->birth_date = $request->birth_date;
        $teacher->phone = $request->phone;
        $teacher->course_id = $request->course_id;
        $teacher->grade_id = $request->grade_id;
        $teacher->in_date = $request->in_date;
        $teacher->out_date = $request->out_date;

        $teacher->save();

        return redirect('/teacherinformation')->with('success', 'Teacher updated!');
    }

    public function createteacher()
    {
        $courses = MCoursesModel::all()->sortBy('course');
        $grades = MGradesModel::all();
        return view('createteacher', ['course' => $courses, 'grade' => $grades]);
    }

    public function saveteacher()
    {
        $teacher = new TeachersModel();
        $teacher->name = request('name');
        $teacher->teacher_id = request('teacher_id');
        $teacher->address = request('address');
        $teacher->city = request('city');
        $teacher->birth_date = request('birth_date');
        $teacher->phone = request('phone');
        $teacher->course_id = request('course_id');
        $teacher->grade_id = request('grade_id');
        $teacher->in_date = request('in_date');
        $teacher->out_date = request('out_date');
        
        $teacher->save();
        return redirect('/teacherinformation')->with('success', 'New teacher added successfully!');
    }

    public function deleteteacher($id=0) 
    {
        if($id != 0){
            // Delete
            DB::table('teachers')->where('t_id', '=', $id)->delete();
        }
        
        return redirect('/teacherinformation')->with('delete', 'Teacher deleted!');
    }
}
