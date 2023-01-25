<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    //
    public function index_teacher()
    {
        $teacher = DB::table('teachers')->where('isDeleted', 1)->get();
        return view('dashboard.archive.teacher-archive')->with('teachers', $teacher);
    }
    public function index_student()
    {
        $student = DB::table('students')->where('isDeleted', 1)->get();
        $departments = DB::table('departments')
            ->get();

        $classes = DB::table('classes')
            ->get();
        return view('dashboard.archive.student-archive')->with('students', $student)
            ->with('departments', $departments)
            ->with('classes', $classes);
    }
}
