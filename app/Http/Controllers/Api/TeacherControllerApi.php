<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherControllerApi extends Controller
{
    public function getData()
    {
        $teachers = DB::table('teachers')->get();
        return response()->json(['teacher' => $teachers]);

    }
}
