<?php

namespace App\Http\Controllers;

use App\Exports\ExportClass;
use App\Exports\ExportClasses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

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

    public function show($classesID)
    {
        $classes = DB::table('classes')->where('id', '=', $classesID)->first();
        $teachers = DB::table('teachers')->select(
            'id',
            'name')->get();
        $departments = DB::table('departments')->get();

        $students = DB::table('students')
            ->select(
                'id',
                'name',
                'dapartment_id',
                'phone_number',
                'whatsapp_number',
                'class_id',
                'state'
            )->get();

        return view('dashboard.classes.show')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('departments', $departments)
            ->with('students', $students);

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


    public function exportClasses(Request $request ){
        return Excel::download(new ExportClasses(), 'Classes.xlsx');
    }

    public function exportClass(Request $request ){
        return Excel::download(new ExportClass($request), 'Class.xlsx');
    }
}
