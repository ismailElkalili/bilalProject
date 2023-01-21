<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $teachers = DB::table('teachers')->select(
            'id',
            'name',
            'date_of_birth',
            'phone_number',
            'whatsapp_number',
            'nation_id'
        )->where('id', $id)->first();
        // dd($teachers);
        return view('dashboard.teacher.index')->with('teachers', $teachers);
    }
    function create()
    {
        $committees = DB::table('committees')->select()->get('id', 'name');
        return view('dashboard.teacher.create')->with('committees', $committees);
    }

    function store()
    {
    }
    function update()
    {
    }

    function edit()
    {
    }
    function destroy()
    {
    }
    function restore()
    {
    }

}