<?php

namespace App\Http\Controllers;

use App\Exports\ExportClass;
use App\Exports\ExportClasses;
use App\Http\Requests\ClassesRequest;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class ClassesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:classes-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:classes-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:classes-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:classes-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $classes = DB::table('classes')->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();
        $departments = DB::table('departments')->get();
        return view('dashboard.classes.index')->with('classes', $classes)->with('teachers', $teachers)->with('departments', $departments);

    }

    public function show($classesID)
    {
        $classes = DB::table('classes')->where('id', '=', $classesID)->first();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();
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

    public function search(Request $request)
    {
        $classes = DB::table('classes')->where('name', 'like', '%' . $request['className'] . '%')
            ->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();
        $departments = DB::table('departments')->get();
        return view('dashboard.classes.index')->with('classes', $classes)->with('teachers', $teachers)->with('departments', $departments);
    }

    public function create(Request $request)
    {
        $classes = DB::table('classes')->get();
        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');
        $departments = DB::table('departments')->get();
        return view('dashboard.classes.create')
            ->with('teachers', $teachers)
            ->with('departments', $departments)
            ->with('classes', $classes);

    }

    public function store(ClassesRequest $request)
    {
        
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
        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');
        $departments = DB::table('departments')->get();
        return view('dashboard.classes.edit')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('departments', $departments);

    }


    public function update(ClassesRequest $request, $classesID)
    {
        DB::table('classes')->where('id', $classesID)->update([
            'name' => $request['classesName'],
            'teacher_id' => $request['teacherID'],
            'department_id' => $request['departmentID'],
        ]);
        return redirect()->action([ClassesController::class, 'index']);
    }


    public function exportClasses(Request $request)
    {
        return Excel::download(new ExportClasses(), 'Classes.xlsx');
    }

    public function exportClass(Request $request)
    {
        return Excel::download(new ExportClass($request), 'Class.xlsx');
    }
    public function destroy($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->back();
    }
}