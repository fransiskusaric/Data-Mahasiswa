<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeachersModel;
use App\StudentsModel;
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

        return redirect()->back();
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
