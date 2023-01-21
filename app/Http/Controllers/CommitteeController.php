<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeController extends Controller
{
    public function index()
    {
       $itemCommittee = DB::table('committees')->get();
        return view('dashborard_layout.dashborard_main');
    }

    public function create(Request $request)
    {
        return view('dashboard.committee.create');
    }

    public function store(Request $request)
    {
    
    }


    public function edit($committeeID)
    {

    }
  
    public function update(Request $request, $committeeID)
    {


    }

    public function destroy($bookID)
    {

    }


}
