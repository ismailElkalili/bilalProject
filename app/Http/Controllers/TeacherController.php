<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    function index()
    {
        $teachers = DB::table('teachers')->select(
            'id',
            'name',
            'date_of_birth',
            'phone_number',
            'whatsapp_number',
            'nation_id'
        )->get();
        // dd($teachers);
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
        foreach ($comm as $com) {
            if ($com->id == $teacher->committees_id) {
                $commname = $com->name;
            }
        }
        // dd($teachers);
        return view('dashboard.teacher.show')->with('teacher', $teacher)->with('commname', $commname);

    }
    function create()
    {
        $committees = DB::table('committees')->select()->get('id', 'name');
        return view('dashboard.teacher.create')->with('committees', $committees);
    }

    function store(TeacherRequest $request)
    {
        $time = strtotime($request['dob']);

        $newformat = date('Y-m-d', $time);
        DB::table('teachers')->insert([
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
    function edit($id)
    {
        $teacher = DB::table('teachers')->where('id', $id)->first();
        $committees = DB::table('committees')->select()->get('id', 'name');
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
// function destroy()
// {
// }
// function restore()
// {
// }

}