<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(){
        return view('frontEnd.login.login');
    }
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('message', 'Info save successfully');

    }
}
