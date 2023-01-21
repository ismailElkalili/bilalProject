<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Teacher;

class TeacherController extends Controller
{
    public function getData(){
       $teachers = DB::table('teachers')->get();
        return response()->json(['teacher'=>$teachers]);
        
    }
}
