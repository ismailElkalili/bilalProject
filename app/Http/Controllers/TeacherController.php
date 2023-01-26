<?php

namespace App\Http\Controllers;

use App\Exports\ExportTeacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Imports\ImportTeacher;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:teacher-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:teacher-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:teacher-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:teacher-delete', ['only' => ['destroy']]);
    }
    function index()
    {
        $teachers = DB::table('teachers')->where('isDeleted', 0)->select(
            'id',
            'name',
            'date_of_birth',
            'phone_number',
            'whatsapp_number',
            'nation_id'
        )->paginate(25);
        // dd($teachers);
        return view('dashboard.teacher.index')->with('teachers', $teachers);

    }
    public function search(Request $request){
        $teachers = DB::table('teachers')->where('name', 'like', '%'.$request['teacherName'].'%')
                ->paginate(25);
        
                return view('dashboard.teacher.index')->with('teachers', $teachers);
    }

    function show($id)
    {
        $commname = '';
        $comm = DB::table('committees')->get();
        $teacher = DB::table('teachers')->select(
            'id',
            'name',
            'date_of_birth',
            'phone_number',
            'whatsapp_number',
            'nation_id',
            'specialization',
            'qualification',
            'committees_id'
        )->where('id', $id)->first();
        $class = DB::table('classes')->select()->where('teacher_id', $id)->get();
        foreach ($comm as $com) {
            if ($com->id == $teacher->committees_id) {
                $commname = $com->name;
            }
        }
        // dd($teachers);
        return view('dashboard.teacher.show')
            ->with('teacher', $teacher)
            ->with('commname', $commname)
            ->with('classes', $class);

    }
    function create()
    {
        $committees = DB::table('committees')->select('id', 'name')->get();
        return view('dashboard.teacher.create')->with('committees', $committees);
    }

    function store(TeacherRequest $request)
    {
        $time = strtotime($request['dob']);
        if ($request['committee'] == -1) {
            $com_id = null;
        } else {
            $com_id = $request['committee'];
        }
        $newformat = date('Y-m-d', $time);
        DB::table('teachers')->insert([
            'name' => $request['teacherName'],
            'phone_number' => $request['phoneNumber'],
            'whatsapp_number' => $request['whatsappNumber'],
            'nation_id' => $request['nationId'],
            'date_of_birth' => $newformat,
            'specialization' => $request['specialization'],
            'qualification' => $request['qualification'],
            'committees_id' => $com_id,
        ]);
        return redirect('/teacher');

    }
    function edit($id)
    {
        $teacher = DB::table('teachers')->where('id', $id)->first();
        $committees = DB::table('committees')->select('id', 'name')->get();
        // dd($teacher);
        return view('dashboard.teacher.edit')
            ->with("teacher", $teacher)
            ->with("committees", $committees);
    }

    function update(TeacherRequest $request)
    {
        $time = strtotime($request['dob']);
        $newformat = date('Y-m-d', $time);
        DB::table('teachers')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['teacherName'],
                'phone_number' => $request['phoneNumber'],
                'whatsapp_number' => $request['whatsappNumber'],
                'nation_id' => $request['nationId'],
                'date_of_birth' => $newformat,
                'specialization' => $request['specialization'],
                'qualification' => $request['qualification'],
                'committees_id' => $request['committee'],
            ]);

        return redirect('/teacher');

    }


    public function importView(Request $request)
    {
        return view('dashboard.teacher.index');
    }

    public function importTeachers(Request $request)
    {
        Excel::import(new ImportTeacher, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportTeachers(Request $request)
    {
        return Excel::download(new ExportTeacher, 'Teachers.xlsx');
    }


    function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->update(['isDeleted' => 1]);
        return redirect('/teacher');
    }
    function restore($id)
    {
        DB::table('teachers')->where('id', $id)->update(['isDeleted' => 0]);
        return redirect('/teacher');
    }

}