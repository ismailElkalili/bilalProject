<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:department-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:department-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $departments = DB::table('departments')->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.department.index')->with('departments', $departments)->with('teachers', $teachers);
    }

    public function show($departmentID)
    {
        $departments = DB::table('departments')->where('id', '=', $departmentID)->first();
        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');
        $allTeacher = DB::table('teachers')->get();
        $classes = DB::table('classes')->where('department_id', '=', $departmentID)->get();
        return view('dashboard.department.show')
        ->with('departments', $departments)
        ->with('teachers', $teachers)
        ->with('classes',$classes)
        ->with('allTeacher',$allTeacher);

    }
    public function search(Request $request)
    {
        $departments = DB::table('departments')->where('name', 'like', '%' . $request['departmentName'] . '%')
            ->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.department.index')->with('departments', $departments)->with('teachers', $teachers);
    }

    public function create(Request $request)
    {
        $departments = DB::table('departments')->get();
        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');
      
        return view('dashboard.department.create')->with('departments', $departments)->with('teachers', $teachers);

    }

    public function store(DepartmentRequest $request)
    {
        $request->validate([
            'departmentName' => 'required|max:50',
            'bossID',
        ]);

        DB::table('departments')->insert([
            'name' => $request['departmentName'],
            'teacher_id' => $request['bossID'],

        ]);

        return redirect()->action([DepartmentController::class, 'index']);
    }

    public function edit($departmentID)
    {
        $departments = DB::table('departments')->where('id', '=', $departmentID)->first();

        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');
        $teacherClass = DB::table('teachers')->where('id', '=', $departments->teacher_id)->first();
        
        return view('dashboard.department.edit')
        ->with('departments', $departments)
        ->with('teachers', $teachers)
        ->with('teacherClass',$teacherClass);

    }

    public function update(DepartmentRequest $request, $departmentID)
    {
        DB::table('departments')->where('id', $departmentID)->update([
            'name' => $request['departmentName'],
            'teacher_id' => $request['bossID'],
        ]);
        
        return  redirect('/departments');

    }

    public function destroy($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back();
    }

}
