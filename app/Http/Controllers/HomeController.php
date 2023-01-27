<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // role_has_permissions
        // $user = DB::table('model_has_roles')->where('model_id','=',Auth::id())->get('role_id');
        // $permissions =DB::table('role_has_permissions')->where('role_id','=',$user[0]->role_id)->get();
        
        // Permission::roles();
        // foreach($permissions as $p){
        //     dd(Permission::findById($p->permission_id,null));
        // }
         
        
        
        // $user = User::find(Auth::id());
        // $user = User::find($id);
        return view('dashboard_layout.dashboard_main');
    }

}
