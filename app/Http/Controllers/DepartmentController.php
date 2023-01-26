<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')->get();
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.department.index')->with('departments', $departments)->with('teachers', $teachers);
    }

    public function search(Request $request){
        $departments = DB::table('departments')->where('name', 'like', '%'.$request['departmentName'].'%')
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
        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.department.create')->with('departments', $departments)->with('teachers', $teachers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'departmentName' => 'required|max:50',
            'bossID'
        ]);

        DB::table('departments')->insert([
            'name' => $request['departmentName'],
            'master_id' => $request['bossID'],

        ]);

        return redirect()->action([DepartmentController::class, 'index']);
    }

    public function edit($departmentID)
    {
        $departments = DB::table('departments')->where('id', '=', $departmentID)->first();

        $teachers = DB::table('teachers')->select(
            'id',
            'name'
        )->get();

        return view('dashboard.department.edit')->with('departments', $departments)->with('teachers', $teachers);

    }

    public function update(Request $request, $departmentID)
    {
        DB::table('departments')->where('id', $departmentID)->update([
            'name' => $request['departmentName'],
            'master_id' => $request['bossID'],
        ]);
        return redirect()->action([DepartmentController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back();
    }


}