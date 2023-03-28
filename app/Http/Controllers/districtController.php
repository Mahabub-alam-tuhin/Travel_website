<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class districtController extends Controller
{
    public $create,$District;
    public function create()
    { 
        return view('admin.district.create',[
            'districts' => District::all(),
        ]);
    }

    public function district_by_division()
    {
        $division_id = request()->division_id;
        return response()->json(District::where('division_id',$division_id)->get());
    }

    public function savedistrict(Request $request)
    {
        $this->create = new District();
        $this->create->division_id = $request->division_id;
        $this->create->name = $request->name;
        $this->create->bn_name = $request->bn_name;
        $this->create->lat = $request->lat;
        $this->create->lon = $request->lon;
        $this->create->url = $request->url;
        $this->create->save();
        return back()->with('message', 'info create successfully');
    }
    public function view()
    {
        $districts = district::paginate(10);
        return view('admin.district.view', [
            'districts' => $districts,
        ]);
    }
    public function edit($id)
    {
        $districts = district::all();
        $District = District::find($id);
        return view('admin.district.edit', compact('District','districts'));
    }
    public function update(Request $request, $id){
        $this->District=District::find($id);
        $this->District->division_id= $request->division_id;
        $this->District->name= $request->name;
        $this->District->bn_name= $request->bn_name;
        $this->District->lat= $request->lat;
        $this->District->lon= $request->lon;
        $this->District->url= $request->url;
        $this->District->update();
        return redirect()->route('admin.district.view');
    }
    public function delete($id)
    {
        $District = District::where('id', $id)->delete();
        return redirect()->route('admin.district.view');
    }
}
