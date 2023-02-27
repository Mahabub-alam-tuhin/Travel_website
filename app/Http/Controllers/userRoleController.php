<?php

namespace App\Http\Controllers;
use App\Models\role;
use App\Models\Saveuser;
use App\Models\userRole;
use Illuminate\Http\Request;

class userRoleController extends Controller
{
    public $store;
    public function roll_assign(){
        return view('admin.user_role.roll_assign',[
            'userRoles'=>userRole::all(),
            'users'=>Saveuser::all(),
        ]);
    }
    public function store(Request $request){
        foreach ($request->user_role as $item)
            {
                $role=new role();
                $role->user_id=$request->user_id;
                $role->role_id=$item;
                $role->save();
            }

        return redirect()->route('dashboard.roll_assign');

    }
}
