<?php

namespace App\Http\Controllers;

use App\Models\Savecarousel;
use Illuminate\Http\Request;

class carouselController extends Controller
{   
    public $image,$imageName,$directory,$imgurl,$savecarousel;
    public function create(){
        return view('admin.carousel.create');
    }
    
    public function savecarousel(Request $request)
    {
        // dd($request->all());
        $this->savecarousel = new Savecarousel();
        $this->savecarousel->title = $request->title;

        if ($request->hasFile('image')) {
            $this->savecarousel->image = $this->saveImage($request);
        }
        $this->savecarousel->save();
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
        return view('admin.carousel.view',[
            'carousel' => Savecarousel::all(),
        ]);
    }

    public function edit($id)
    {
        $carousel = Savecarousel::find($id);
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {

        $carousel = Savecarousel::find($id);
        $carousel->title = $request->title;

        if ($request->hasFile('image')) {
            // dd($saveImage($request));
            //  dd ($saveguides,$saveImage($request) );
            $carousel->image =  $this->saveImage($request);
        }
        $carousel->save();
        return redirect()->route('admin.carousel.view');
    }

    public function delete($id)
    {
        Savecarousel::where('id', $id)->delete();
        return redirect()->route('admin.carousel.view');
    }



}
