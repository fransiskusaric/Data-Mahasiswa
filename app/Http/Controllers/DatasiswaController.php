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
            $list_student = MStudentsModel::with('grades')->where('name', 'LIKE', '%'.$search.'%')->paginate($number);
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
            $search = $request->search;
            $list_student = MStudentsModel::with('grades')->where('name', 'LIKE', '%'.$search.'%')->paginate($number);
            return view('tablestudent', ['list_student' => $list_student])->render();
        }
    }

    public function detailstudent($id) {
        $student = DB::table('M_Students as s')
            ->join('Student_Grade as sg', 'sg.student_id', '=', 's.student_id')
            ->join('M_Grades as g', 'g.grade_id', '=', 'sg.grade_id')
            ->join('Student_Subgrade as ssbg', 'ssbg.student_grade_id', '=', 'sg.student_grade_id')
            ->join('M_Subgrades as sbg', 'sbg.subgrade_id', '=', 'ssbg.subgrade_id')
            ->join('Student_Class as sc', 'sc.student_subgrade_id', '=', 'ssbg.student_subgrade_id')
            ->join('Classes as cl', 'cl.classroom_id', '=', 'sc.classroom_id')
            ->join('Teachers as t', 't.teacher_id', '=', 'cl.teacher_id')
            ->where('s.s_id', '=', $id)
            ->select('s.*', 'g.grade as grade', 'cl.classroom as classroom', 't.name as teacher')
            ->first();

        $studentcourse = DB::table('M_Students as s')
            ->join('Student_Grade as sg', 'sg.student_id', '=', 's.student_id')
            ->join('M_Grades as g', 'g.grade_id', '=', 'sg.grade_id')
            ->join('Student_Subgrade as ssbg', 'ssbg.student_grade_id', '=', 'sg.student_grade_id')
            ->join('M_Subgrades as sbg', 'sbg.subgrade_id', '=', 'ssbg.subgrade_id')
            ->join('Student_Class as sc', 'sc.student_subgrade_id', '=', 'ssbg.student_subgrade_id')
            ->join('Classes as cl', 'cl.classroom_id', '=', 'sc.classroom_id')
            ->join('Student_Scores as scg', 'scg.student_class_id', '=', 'sc.student_class_id')
            ->join('Course_Grade as cg', 'cg.course_grade_id', '=', 'scg.course_grade_id')
            ->join('M_Courses as cr', 'cr.course_id', '=', 'cg.course_id')
            ->where('s.s_id', '=', $id)
            ->select('scg.*', 'cr.course as course')
            ->get();

        // $student = MStudentsModel::with('grades')->where('s_id', $id)->first();
        return view('detailstudent', ['student' => $student, 'studentcourse' => $studentcourse]);
    }

    public function savescore(Request $request) {
        $score_id = $request->score_id;
        $studentscore = StudentScoresModel::whereIn('score_id', $score_id)->get();
        $task = $request->task;
        $mid_test = $request->mid_test;
        $final_test = $request->final_test;

        $i=0;
        foreach($studentscore as $score) {
            $score->task = $task[$i];
            $score->mid_test = $mid_test[$i];
            $score->final_test = $final_test[$i];
            if($score->task != null && $score->mid_test != null && $score->final_test != null) {
                $score->score = ceil($score->task * 0.3 + $score->mid_test * 0.3 + $score->final_test * 0.4);
            } else {
                $score->score = null;
            }
            $score->save();
            $i++;
        }

        return $this->detailstudent($request->s_id);
    }

    public function editstudent($id)
    {
        $grades = MGradesModel::all();
        $subgrades = MSubgradesModel::all();
        $majors = MMajorsModel::all();
        $classes = ClassesModel::all();

        $student = DB::table('M_Students as s')
            ->join('Student_Grade as sg', 'sg.student_id', '=', 's.student_id')
            ->join('M_Grades as g', 'g.grade_id', '=', 'sg.grade_id')
            ->join('Student_Subgrade as ssbg', 'ssbg.student_grade_id', '=', 'sg.student_grade_id')
            ->join('M_Subgrades as sbg', 'sbg.subgrade_id', '=', 'ssbg.subgrade_id')
            ->join('Student_Class as sc', 'sc.student_subgrade_id', '=', 'ssbg.student_subgrade_id')
            ->join('Classes as cl', 'cl.classroom_id', '=', 'sc.classroom_id')
            ->where('s.s_id', '=', $id)
            ->select('s.*', 
            'sg.enroll_date as enroll_date', 'sg.grad_date as grad_date',
            'sg.grade_id as grade_id', 'g.grade as grade', 
            'ssbg.subgrade_id as subgrade_id', 'sbg.subgrade as subgrade',
            'sc.classroom_id as classroom_id','cl.classroom as classroom')
            ->first();

        $studentmajor = DB::table('M_Students as s')
            ->join('Student_Grade as sg', 'sg.student_id', '=', 's.student_id')
            ->join('M_Grades as g', 'g.grade_id', '=', 'sg.grade_id')
            ->join('Student_Subgrade as ssbg', 'ssbg.student_grade_id', '=', 'sg.student_grade_id')
            ->join('M_Subgrades as sbg', 'sbg.subgrade_id', '=', 'ssbg.subgrade_id')
            ->join('Student_Class as sc', 'sc.student_subgrade_id', '=', 'ssbg.student_subgrade_id')
            ->join('Classes as cl', 'cl.classroom_id', '=', 'sc.classroom_id')
            ->join('M_Majors as m', 'm.major_id', '=', 'cl.major_id')
            ->where('s.s_id', '=', $id)
            ->select('cl.major_id as major_id', 'm.major as major')
            ->first();

        return view('editstudent', ['student' => $student, 'studentmajor' => $studentmajor, 'grade' => $grades, 'subgrade' => $subgrades, 'major' => $majors, 'classes' => $classes]);
    }

    public function updatestudent(Request $request)
    {
        $name = $request->name;
        $student_id = $request->student_id;
        $address = $request->address;
        $city = $request->city;
        $birth_date = $request->birth_date;
        $phone = $request->phone;
        $grade_id = $request->grade_id;
        $subgrade_id = $request->subgrade_id;
        $classroom_id = $request->classroom_id;
        $major_id = $request->major_id;
        $enroll_date = $request->enroll_date;
        $grad_date = $request->grad_date;

        $student = MStudentsModel::where('s_id', $request->s_id)->first();
        $student->name = $name;
        $student->student_id = $student_id;
        $student->address = $address;
        $student->city = $city;
        $student->birth_date = $birth_date;
        $student->phone = $phone;
        $student->save();

        $grade = StudentGradeModel::where('student_id', $student_id)->first();
        $oldgrade_id = $grade->grade_id;
        $grade->student_id = $student_id;
        $grade->grade_id = $grade_id;
        $grade->enroll_date = $enroll_date;
        $grade->grad_date = $grad_date;
        $grade->save();

        $subgrade = StudentSubgradeModel::where('student_grade_id', $grade->student_grade_id)->first();
        $oldsubgrade_id = $subgrade->subgrade_id;
        $subgrade->subgrade_id = $subgrade_id;
        $subgrade->save();

        $classroom = StudentClassModel::where('student_subgrade_id', $subgrade->student_subgrade_id)->first();
        $classroom->classroom_id = $classroom_id;
        $classroom->save();
        
        if($oldgrade_id != $grade_id || $oldsubgrade_id != $subgrade_id) {
            $score = StudentScoresModel::where('student_class_id', $classroom->student_class_id)->delete();
            if($major_id) {
                $course_grade = CourseGradeModel::where([['grade_id', $grade_id], ['major_id', $major_id]])
                    ->orWhere([['grade_id', $grade_id], ['major_id', null]])
                    ->get();
            } else {
                $course_grade = CourseGradeModel::where('grade_id', $grade_id)->get();
            }
            foreach($course_grade as $cg) {
                $scores = new StudentScoresModel();
                $scores->student_class_id = $classroom->student_class_id;
                $scores->course_grade_id = $cg->course_grade_id;
                $scores->save();
            }
        }
        
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

    function deletestudent($id) {
        if($id != 0){
            $student = MStudentsModel::where('s_id', $id)->first();
            $grade = StudentGradeModel::where('student_id', $student->student_id)->first();
            $subgrade = StudentSubgradeModel::where('student_grade_id', $grade->student_grade_id)->first();
            $classroom = StudentClassModel::where('student_subgrade_id', $subgrade->student_subgrade_id)->first();     
            $score = StudentScoresModel::where('student_class_id', $classroom->student_class_id)->delete();
            $student->forceDelete();
            $grade->forceDelete();
            $subgrade->forceDelete();
            $classroom->forceDelete();
        }
        
        return redirect('/studentinformation')->with('delete', 'Student deleted!');
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
