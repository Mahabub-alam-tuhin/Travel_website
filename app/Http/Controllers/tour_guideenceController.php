<?php

namespace App\Http\Controllers;

use App\Models\Saveguide;
use Illuminate\Http\Request;

class tour_guideenceController extends Controller
{
    public $create, $saveguide, $image, $imageName, $directory, $imgurl;
    public function create()
    {
        return view('admin.tour_guideence.create');
    }
    public function saveguide(Request $request)
    {
        // dd($request->all());
        $this->saveguide = new Saveguide();
        $this->saveguide->name = $request->name;
        $this->saveguide->phone = $request->phone;
        $this->saveguide->facebook = $request->facebook;
        $this->saveguide->twitter = $request->twitter;
        $this->saveguide->linkdin = $request->linkdin;
        $this->saveguide->Instagram = $request->Instagram;
        $this->saveguide->youtube = $request->youtube;

        if ($request->hasFile('image')) {
            $this->saveguide->image = $this->saveImage($request);
        }
        $this->saveguide->save();
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
        return view('admin.tour_guideence.view', [
            'saveguides' => Saveguide::all()
        ]);
    }
    public function edit($id)
    {
        $saveguides = Saveguide::find($id);
        return view('admin.tour_guideence.edit', compact('saveguides'));
    }

    public function update(Request $request, $id)
    {

        $saveguides = Saveguide::find($id);
        $saveguides->name = $request->name;
        $saveguides->phone = $request->phone;

        if ($request->hasFile('image')) {
            // dd($saveImage($request));
            //  dd ($saveguides,$saveImage($request) );
            $saveguides->image =  $this->saveImage($request);
        }
        $saveguides->save();
        return redirect()->route('admin.tour_guideence.view');
    }

    public function delete($id)
    {
        $saveguides = Saveguide::where('id', $id)->delete();
        return redirect()->route('admin.tour_guideence.view');
    }
}
