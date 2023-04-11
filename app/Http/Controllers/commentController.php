<?php

namespace App\Http\Controllers;

use App\Models\saveComment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public $create,$image,$imageName,$directory,$imgurl;
    public function create(Request $request){
       $this->create=new saveComment();
       $this->create->image=$request->image;
       $this->create->name=$request->name;
       $this->create->email=$request->email;
       $this->create->comment=$request->comment;
       $this->create->message=$request->message;
       if ($request->hasFile('image')) {
         $this->create->image = $this->saveImage($request);
     }
     $this->create->save();
     return back()->with('message', 'Info save successfully');

//       return $request;
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
 

   
}
