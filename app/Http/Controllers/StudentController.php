<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
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
            'name')->get();
        $classes = DB::table('classes')->select(
            'id',
            'name')->get();

        return view('dashboard.student.create')->with('departments', $departments)->with('classes', $classes);

    }

    public function store(Request $request)
    {
        $request->validate([
            'studentName' => 'required|max:50',
        ]);

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

    public function update(Request $request, $studentID)
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
            'state' => '0',
            'date_of_birth' => $request['dob'],
        ]);
        return redirect()->action([StudentController::class, 'index']);
    }

    public function show($studentID){

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
}
