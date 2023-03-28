<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class divisionController extends Controller
{
    public $create, $Division;
    public function create()
    {
        return view('admin.division.create');
    }
    public function savedivision(Request $request)
    {
        $this->create = new Division();
        $this->create->name=$request->name;
        $this->create->bn_name=$request->bn_name;
        $this->create->url=$request->url;
        $this->create->save();
        return back()->with('message','info create successfully');
    }
    public function view()
    {
        return view('admin.division.view', [
            'divisions' => Division::all()
        ]);
    }
    public function edit($id){
        $Division = Division::find($id);
        return view('admin.division.edit',compact('Division'));
    }
    public function update(Request $request, $id){
        $this->Division=Division::find($id);
        $this->Division->name= $request->name;
        $this->Division->bn_name= $request->bn_name;
        $this->Division->url= $request->url;
        $this->Division->update();
        return redirect()->route('admin.division.view');
    }
    public function delete($id)
    {
        $Division = Division::where('id', $id)->delete();
        return redirect()->route('admin.division.view');
    }
}
