<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommiteeRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:committee-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:committee-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:committee-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:committee-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $committees = DB::table('committees')->get();
        return view('dashboard.committee.index')->with('committees', $committees);
    }

    public function search(Request $request)
    {
        $committees = DB::table('committees')->where('name', 'like', '%' . $request['committeeName'] . '%')
            ->get();

        return view('dashboard.committee.index')->with('committees', $committees);
    }

    public function create(Request $request)
    {
        $teachers = DB::select('SELECT t.*
        FROM teachers AS t WHERE NOT(
         t.id in ( SELECT c.matser_id FROM committees AS c WHERE c.matser_id = t.id
         ))
        ');
        return view('dashboard.committee.create')->with('teachers', $teachers);

    }

    public function show($committeeID)
    {

        $committee = DB::table('committees')->where('id', '=', $committeeID)->first();
        $teachers = DB::table('teachers')->where('committees_id', '=', $committee->id)->select(
            'id',
            'name',
            'committees_id'
        )->get();
            
        return view('dashboard.committee.show')
            ->with('committee', $committee)
            ->with('teachers', $teachers);
    }


    public function store(CommiteeRequest $request)
    {

        DB::table('committees')->insert([
            'name' => $request['committeeName'],
            'description' => $request['description'],
            'matser_id' => $request['bossID'],

        ]);

        return redirect()->action([CommitteeController::class, 'index']);
    }


    public function edit($committeeID)
    {
        $committee = DB::table('committees')->where('id', '=', $committeeID)->first();
        $teachers = DB::table('teachers')->where('committees_id', '=', $committee->id)->select(
            'id',
            'name'
        )->get();

        return view('dashboard.committee.edit')
            ->with('committee', $committee)
            ->with('teachers', $teachers);

    }

    public function update(CommiteeRequest $request, $committeeID)
    {
        DB::table('committees')->where('id', $committeeID)->update([
            'name' => $request['committeeName'],
            'description' => $request['description'],
            'matser_id' => $request['bossID'],
        ]);
        return redirect()->action([CommitteeController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('committees')->where('id', $id)->delete();
        return redirect()->back();
    }


}