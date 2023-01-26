<?php

namespace App\Http\Controllers;

use App\Exports\ExportStudent;
use App\Http\Requests\StudentRequest;
use App\Imports\ImportStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:student-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:student-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $students = DB::table('students')->where('isDeleted', 0)->orderBy('id')
            ->select(
                'id',
                'name',
                'dapartment_id',
                'phone_number',
                'whatsapp_number',
                'class_id',
                'state'
            )->paginate(25);

        $departments = DB::table('departments')
            ->get();

        $classes = DB::table('classes')
            ->get();

        return view('dashboard.student.index')
            ->with('students', $students)
            ->with('departments', $departments)
            ->with('classes', $classes);
    }

    public function search(Request $request)
    {
        $students = DB::table('students')->where('name', 'like', '%' . $request['studentName'] . '%')
            ->select(
                'id',
                'name',
                'dapartment_id',
                'phone_number',
                'whatsapp_number',
                'class_id',
                'state'
            )->paginate(25);

        $departments = DB::table('departments')
            ->get();

        $classes = DB::table('classes')
            ->get();

        return view('dashboard.student.index')
            ->with('students', $students)
            ->with('departments', $departments)
            ->with('classes', $classes);
    }
    public function create(Request $request)
    {
        $departments = DB::table('departments')->select(
            'id',
            'name'
        )->get();
        $classes = DB::table('classes')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.student.create')->with('departments', $departments)->with('classes', $classes);

    }

    public function store(StudentRequest $request)
    {
        // $time = strtotime($request['dob']);
        // // dd($time);
        // $newformat = date("dd-mm-yyyy", $time);

        DB::table('students')->insert([
            'name' => $request['studentName'],
            'phone_number' => $request['phonenumber'],
            'address' => $request['address'],
            'whatsapp_number' => $request['whatsappnumber'],
            'father_job' => $request['fatherjob'],
            'nationality' => $request['nationality'],
            'nation_id' => $request['nationid'],
            'dapartment_id' => $request['departmentID'],
            'class_id' => $request['classesID'],
            'state' => '0',
            'date_of_birth' => $request['dob'],

        ]);

        return redirect()->action([StudentController::class, 'index']);
    }

    public function edit($studentID)
    {
        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $departments = DB::table('departments')
            ->get();

        $classes = DB::table('classes')
            ->get();

        return view('dashboard.student.edit')
            ->with('student', $student)
            ->with('departments', $departments)
            ->with('classes', $classes);

    }

    public function update(StudentRequest $request, $studentID)
    {
        DB::table('students')->where('id', $studentID)->update([
            'name' => $request['studentName'],
            'phone_number' => $request['phonenumber'],
            'address' => $request['address'],
            'whatsapp_number' => $request['whatsappnumber'],
            'father_job' => $request['fatherjob'],
            'nationality' => $request['nationality'],
            'nation_id' => $request['nationid'],
            'dapartment_id' => $request['departmentID'],
            'class_id' => $request['classesID'],
            'state' => $request['state'],
            'date_of_birth' => $request['dob'],
        ]);
        return redirect()->action([StudentController::class, 'index']);
    }

    public function show($studentID)
    {

        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $departments = DB::table('departments')
            ->get();

        $classes = DB::table('classes')
            ->get();

        return view('dashboard.student.show')
            ->with('student', $student)
            ->with('departments', $departments)
            ->with('classes', $classes);
    }

    public function archive($id)
    {
        DB::table('students')->where('id', $id)->update(['isDeleted' => 1]);
        return redirect('/student');
    }
    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect('/student');
    }
    public function restore($id)
    {
        DB::table('students')->where('id', $id)->update(['isDeleted' => 0]);
        return redirect('/student');
    }
    public function importView(Request $request)
    {
        return view('dashboard.student.index');
    }

    public function importStudents(Request $request)
    {
        Excel::import(new ImportStudent, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportStudents(Request $request)
    {
        return Excel::download(new ExportStudent, 'Students.xlsx');
    }

}