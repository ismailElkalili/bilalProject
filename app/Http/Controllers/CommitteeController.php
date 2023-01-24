<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = DB::table('committees')->get();
        return view('dashboard.committee.index')->with('committees',$committees);
    }

    public function create(Request $request)
    {
       $teachers = DB::table('teachers')->select(
        'id',
        'name')->get();
        return view('dashboard.committee.create')->with('teachers' , $teachers);

    }

    public function show($committeeID){

        $committee = DB::table('committees')->where('id', '=', $committeeID)->first();
        $teachers = DB::table('teachers')->select(
            'id',
            'name',
            'committees_id')->get();

        return view('dashboard.committee.show')
        ->with('committee',$committee)
        ->with('teachers',$teachers);
    }


    public function store(Request $request)
    {
        $request->validate([
            'committeeName'=>'required|max:50',
            'description'=>'required|max:1000',
            'bossID'
        ]);
        
        DB::table('committees')->insert([
                'name'=> $request['committeeName'], 
                'description'=> $request['description'], 
                'matser_id'=> $request['bossID'], 

        ]);
        
        return redirect()->action([CommitteeController::class, 'index']);
    }


    public function edit($committeeID)
    {
        $committee = DB::table('committees')->where('id', '=', $committeeID)->first();
        $teachers = DB::table('teachers')->select(
            'id',
            'name')->get();

        return view('dashboard.committee.edit')
        ->with('committee',$committee)
        ->with('teachers',$teachers);

    }

    public function update(Request $request, $committeeID)
    {
        DB::table('committees')->where('id',$committeeID)->update([
            'name'=> $request['committeeName'], 
            'description'=>$request['description'],
            'matser_id'=> $request['bossID'],
        ]);
        return redirect()->action([CommitteeController::class, 'index']);
    }

    public function destroy($committeeID)
    {

    }


}