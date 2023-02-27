<?php

namespace App\Http\Controllers;

use App\Models\permission;
use Illuminate\Http\Request;

class permisssionController extends Controller
{
    public $create,$permission;
    public function create(){
        return view('admin.permission.create');
    }
    public function savePermission(Request $request){
        $this->create=new permission();
        $this->create->title=$request->title;
        $this->create->address=$request->address;
        $this->create->designation=$request->designation;
        $this->create->Phone=$request->Phone;
        $this->create->save();
        return back()->with('message','info create successfully');
//       return $request;
    }
    public function view(){
        return view('admin.permission.view',[
        'permissions'=>permission::get()
        ]);
    }
    public function edit($id){
        $permission = permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }
    public function update(Request $request,$id){
        $this->permission=permission::find($id);
        $this->permission->title=$request->title;
        $this->permission->address=$request->address;
        $this->permission->designation=$request->designation;
        $this->permission->Phone=$request->Phone;

        $this->permission->update();
        return redirect()->route('dashboard.permission.view');
    }
         public function delete($id){
         $permission = permission::where('id', $id)->delete();
         return redirect()->route('dashboard.permission.view');
    }

}
