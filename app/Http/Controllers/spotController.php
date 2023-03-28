<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class spotController extends Controller
{
    public $create,$spot;
    public function create()
    {
        return view('admin.spot.create');
    }
    public function saveSpot(Request $request)
    {
        $this->create = new Spot();
        $this->create->name = $request->name;
        $this->create->country = $request->country;
        $this->create->District = $request->District;
        $this->create->upazila = $request->upazila;
        $this->create->Zip = $request->Zip;
        $this->create->save();
        return back()->with('message', 'info create successfully');
        //       return $request;


    }

    public function view()
    {
        return view('admin.spot.view',[
            'spots'=>spot::all()
                ]);
    }
    public function edit($id){
        $spot = spot::find($id);
        return view('admin.spot.edit', compact('spot'));
    }
    public function update(Request $request, $id){
        $this->spot=spot::find($id);
        $this->spot->name= $request->name;
        $this->spot->country= $request->country;
        $this->spot->District= $request->District;
        $this->spot->upazila= $request->upazila;
        $this->spot->Zip= $request->Zip;

        $this->spot->update();
        return redirect()->route('admin.spot.view');
    }
    public function delete($id)
    {
        $spot = spot::where('id', $id)->delete();
        return redirect()->route('admin.spot.view');
    }
}
?>



