<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    //
    function index_teacher()
    {
        $teacher = DB::table('teachers')->where('isDeleted', 1)->get();
        return view('dashboard.archive.teacher-archive')->with('teachers', $teacher);
    }
    function index_student()
    {
        $student = DB::table('students')->where('isDeleted', 1)->get();
        return view('dashboard.archive.student-archive')->with('students', $student);
    }
}