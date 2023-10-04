<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public $create,$image,$imageName,$directory,$imgurl,$saveabout,$main_image,$first_image,$second_image;
    public function create(){
        return view('admin.about.create');
    }
    public function saveabout(Request $request)
    {
        $this->saveabout = new about();      
        $this->saveabout->title = $request->title;
        $this->saveabout->details = $request->details;
       
        if ($request->hasFile('main_image')) {
            $this->saveabout->main_image = $this->mainsaveImage($request);
        }

        if ($request->hasFile('first_image')) {
            $this->saveabout->first_image = $this->firstsaveImage($request);
        }
        
        // dd ($request->second_image);
        
        if ($request->hasFile('second_image')) {
            $this->saveabout->second_image = $this->secondsaveImage($request);
        }
        $this->saveabout->save();
        return back()->with('message', 'Info save successfully');
    }

    private function mainsaveImage($request)
    {
        $this->main_image = $request->file('main_image');
        $this->imageName = rand() . '.' . $this->main_image->getclientOriginalExtension();
        $this->directory = 'adminAsset/user-image/';
        $this->imgurl = $this->directory . $this->imageName;
        $this->main_image->move($this->directory, $this->imageName);
        return $this->imgurl;
    }
    private function firstsaveImage($request)
    {
        $this->first_image = $request->file('first_image');
        $this->imageName = rand() . '.' . $this->first_image->getclientOriginalExtension();
        $this->directory = 'adminAsset/user-image/';
        $this->imgurl = $this->directory . $this->imageName;
        $this->first_image->move($this->directory, $this->imageName);
        return $this->imgurl;
     
    }
    private function secondsaveImage($request)
    {
        $this->second_image = $request->file('second_image');
        $this->imageName = rand() . '.' . $this->second_image->getclientOriginalExtension();
        $this->directory = 'adminAsset/user-image/';
        $this->imgurl = $this->directory . $this->imageName;
        $this->second_image->move($this->directory, $this->imageName);
        return $this->imgurl;
    }

    public function view(){
        return view('admin.about.view',[
            'abouts' => about::all(),
        ]);
    }
 
    public function delete($id)
    {
        $abouts = about::where('id', $id)->delete();
        return redirect()->route('admin.about.view');
    }
    public function total($id){
        
    }
 
    }
