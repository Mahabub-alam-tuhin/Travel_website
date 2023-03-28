<?php

namespace App\Http\Controllers;

use App\Models\userRole;
use Illuminate\Http\Request;



class roleController extends Controller
{
    public $create,$userRole;
   public function create(){
       return view('admin.role_menu.create');
   }
   public function saveRole(Request $request){
       $this->create=new userRole();
       $this->create->role_id=$request->role_id;
       $this->create->title=$request->title;
       $this->create->serial=$request->serial;
       $this->create->status=$request->status;
       $this->create->save();
       return back()->with('message','info create successfully');
//       return $request;
   }
   public function view(){
       return view('admin.role_menu.view',[
       'userRoles'=>userRole::all()
           ]);
   }
    public function edit($id){
        $userRole = userRole::find($id);
        return view('admin.role_menu.edit', compact('userRole'));
    }
    public function update(Request $request, $id){
        $this->userRole=userRole::find($id);
        $this->userRole->title= $request->title;
        $this->userRole->serial= $request->serial;
        $this->userRole->status= $request->status;

        $this->userRole->update();
        return redirect()->route('dashboard.view');
    }
    public function delete($id)
    {
        $userRole = userRole::where('id', $id)->delete();
        return redirect()->route('dashboard.view');
    }
}


?>