<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = DB::table('classes')->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name')->get();
        $departments = DB::table('departments')->get();
        return view('dashboard.classes.index')->with('classes', $classes)->with('teachers', $teachers)->with('departments', $departments);

    }

    public function create(Request $request)
    {
        $teachers = DB::table('teachers')->select(
            'id',
            'name')->get();
            $departments = DB::table('departments')->get();
        return view('dashboard.classes.create')->with('teachers', $teachers)->with('departments', $departments);

    }

    public function store(Request $request)
    {
        $request->validate([
            'classesName' => 'required|max:50',
            'teacherID',
        ]);

        DB::table('classes')->insert([
            'name' => $request['classesName'],
            'teacher_id' => $request['teacherID'],
            'department_id' => $request['departmentID'],

        ]);

        return redirect()->action([ClassesController::class, 'index']);
    }

    public function edit($classesID)
    {
        $classes = DB::table('classes')->where('id', '=', $classesID)->first();
        $teachers = DB::table('teachers')->select(
            'id',
            'name')->get();
            $departments = DB::table('departments')->get();
        return view('dashboard.classes.edit')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('departments', $departments);

    }

    public function update(Request $request, $classesID)
    {
        DB::table('classes')->where('id', $classesID)->update([
            'name' => $request['classesName'],
            'teacher_id' => $request['teacherID'],
            'department_id' => $request['departmentID'],
        ]);
        return redirect()->action([ClassesController::class, 'index']);
    }

    public function destroy($classesID)
    {

    }
}
