<?php

namespace App\Http\Controllers;

use App\Models\destination;
use Illuminate\Http\Request;

class destinationController extends Controller
{
    public $savedestination,$image,$imageName,$directory,$imgurl,$Destination;
    public function create (){
        return view('admin.destination.create');
    }
     public function savedestination(Request $request)
    {
        $this->savedestination = new destination();
        $this->savedestination->title = $request->title;
        $this->savedestination->city = $request->city;

        if ($request->hasFile('image')) {
            $this->savedestination->image = $this->saveImage($request);
        }
        $this->savedestination->save();
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

    public function view(){
        return view('admin.destination.view',[
            'Destination' => destination::all(),
        ]);
    }
 
    public function edit($id){
        $Destination = destination::find($id);
        return view('admin.destination.edit', compact('Destination'));
    }

    public function update(Request $request, $id){
        $this->Destination=destination::find($id);
        $this->Destination->title= $request->title;
        $this->Destination->city= $request->city;


        if ($request->hasFile('image')) {
            // dd($saveImage($request));
            //  dd ($saveresorts,$saveImage($request) );
               $this->Destination->image =  $this->saveImage($request);
        }
        $this->Destination->save();
        return redirect()->route('admin.destination.view');
    }

    public function delete($id)
    {
        destination::where('id', $id)->delete();
        return redirect()->route('admin.destination.view');
    }
}
