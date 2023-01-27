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
        // $teachers = Teacher::with('Department')->get();

        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
         ) OR
         t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        ');

        // dd(
        //     DB::select('SELECT t.*
        //     FROM teachers AS t WHERE NOT(
        //      t.id in ( SELECT c.teacher_id FROM classes AS c WHERE c.teacher_id = t.id
        //      ) OR
        //      t.id in ( SELECT d.teacher_id FROM departments AS d WHERE d.teacher_id = t.id   ))
        //     ')

        // );

      
        return view('dashboard.department.create')->with('departments', $departments)->with('teachers', $teachers);

//         SELECT
//     t.*
// FROM
//     teachers t
// WHERE NOT(
//     t.id in (
//         SELECT c.teacher_id FROM classes c WHERE c.teacher_id = t.id
// ) OR
// t.id in (
//         SELECT d.teacher_id FROM departments d WHERE d.teacher_id = t.id
// )
// )

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

        return view('dashboard.department.edit')->with('departments', $departments)->with('teachers', $teachers);

    }

    public function update(DepartmentRequest $request, $departmentID)
    {
        DB::table('departments')->where('id', $departmentID)->update([
            'name' => $request['departmentName'],
            'teacher_id' => $request['bossID'],
        ]);
        return redirect()->action([DepartmentController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back();
    }

}
