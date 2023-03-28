<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class upazilaController extends Controller
{   public $create,$Upazila;
    public function create(){
        return view ('admin.upazila.create',[
            'upazilas' => Upazila::all(),
        ]);
    }


    public function upazila_by_district()
    {
        $district_id = request()->district_id;
        return response()->json(Upazila::where('district_id',$district_id)->get());
    }


    public function saveupazila(Request $request)
    {
    
        $this->create = new Upazila();
        $this->create->district_id=$request->district_id;
        $this->create->name=$request->name;
        $this->create->bn_name=$request->bn_name;
        $this->create->url=$request->url;
        $this->create->save();
        return back()->with('message','info create successfully');
    }
    public function view(){
        $upazilas = upazila::paginate(10);
        return view('admin.upazila.view',[
            'upazilas' => $upazilas,
        ]); 
    }
    public function edit($id){
        $upazilas = upazila::all();
        $Upazila = Upazila::find($id);
        return view('admin.upazila.edit',compact('Upazila','upazilas'));
    }
    public function update(Request $request, $id){
        // dd($request->all()); 
        $this->Upazila=Upazila::find($id);
        $this->Upazila->district_id= $request->district_id;
        $this->Upazila->name= $request->name;
        $this->Upazila->bn_name= $request->bn_name;
        $this->Upazila->url= $request->url;
        $this->Upazila->update();
        
        return redirect()->route('admin.upazila.view');
    }
    public function delete($id)
    {
        $Upazila = Upazila::where('id', $id)->delete();
        return redirect()->route('admin.upazila.view');
    }

}
