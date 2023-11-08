<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\saveresort;
use App\Models\Division;
use App\Models\Saveguide;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class resort_ManagementController extends Controller
{
    public $create, $saveresorts, $saveresort, $image, $imageName, $directory, $imgurl;
    public function create()
    {
        
        $divisions = Division::all();
        $upazilas = Upazila::all();
        $unions = Union::all();
        $districts = District::all();
        $guids=Saveguide::all();
        return view('admin.resort_Management.create', compact('divisions', 'upazilas', 'unions', 'districts','guids'));
    }

    public function saveresort(Request $request)
    {
        $this->saveresort = new saveresort();
        $this->saveresort->division_id = $request->division_id;
        $this->saveresort->district_id = $request->district_id;
        $this->saveresort->upazila_id = $request->upazila_id;
        $this->saveresort->union_id = $request->union_id;
        $this->saveresort->guid_id = $request->guid_id;
        $this->saveresort->name = $request->name;
        $this->saveresort->day = $request->day;
        $this->saveresort->person = $request->person;
        $this->saveresort->phone = $request->phone;
        $this->saveresort->age = $request->age;
        $this->saveresort->description = $request->description;
        $this->saveresort->entry_fee = $request->entry_fee;

        if ($request->hasFile('image')) {
            $this->saveresort->image = $this->saveImage($request);
        }
        $this->saveresort->save();
        return back()->with('message', 'Info save successfully');
    }

    private function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand() . '.' . $this->image->getclientOriginalExtension();
        $this->directory = 'adminAsset/user-image/';
        $this->imgurl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imgurl;
    }

    public function view()
    {
        $saveresorts = saveresort::with(['divisions', 'district', 'upazila', 'union'])->paginate(5);
        return view('admin.resort_Management.view', [
            'saveresorts' => $saveresorts
        ]);
    }
    public function edit($id)
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();
        $guids=Saveguide::all();
        $saveresorts = saveresort::find($id);
        
        return view('admin.resort_Management.edit', compact('saveresorts', 'divisions', 'districts', 'upazilas', 'unions','guids'));
    }
    public function upadte(Request $request, $id)
    {

        $saveresorts = saveresort::find($id);
        $saveresorts->division_id = $request->division_id;
        $saveresorts->district_id = $request->district_id;
        $saveresorts->upazila_id = $request->upazila_id;
        $saveresorts->union_id = $request->union_id;
        $saveresorts->guid_id = $request->guid_id;
        $saveresorts->name = $request->name;
        $saveresorts->phone = $request->phone;
        $saveresorts->day = $request->day;
        $saveresorts->person = $request->person;
        $saveresorts->age = $request->age;
        $saveresorts->description = $request->description;
        $saveresorts->entry_fee = $request->entry_fee;

        if ($request->hasFile('image')) {
            // dd($saveImage($request));
            //  dd ($saveresorts,$saveImage($request) );
            $saveresorts->image =  $this->saveImage($request);
        }
        $saveresorts->save();
        return redirect()->route('admin.resort_Management.view');
    }
    public function delete($id)
    {
        $saveresorts = saveresort::where('id', $id)->delete();
        return redirect()->route('admin.resort_Management.view');
    }

    public function upload(Request $request)
{
    $this->image = $request->file('image');
        $this->imageName = rand() . '.' . $this->image->getclientOriginalExtension();
        $this->directory = 'adminAsset/user-image/';
        $this->imgurl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imgurl;
}   
    
}
