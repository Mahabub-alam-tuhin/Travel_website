<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\Saveuser;
use App\Models\User;
use App\Models\user_permission;
use Illuminate\Http\Request;

class permitController extends Controller
{
   public function create(){
       return view('admin.permit.create',[
           'permissions'=>permission::all(),
           'users'=>Saveuser::all(),
           ]);
   }
    public function store(Request $request){
        foreach ($request->permission as $item)
        {
            $permission=new user_permission();
            $permission->user_id=$request->user_id;
            $permission->permission_id=$item;
            $permission->save();
        }

        return redirect()->route('dashboard.permit.create');

    }
}
