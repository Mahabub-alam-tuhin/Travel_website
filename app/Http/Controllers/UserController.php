<?php

namespace App\Http\Controllers;

use App\Models\Saveuser;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;


class UserController extends Controller
{
    public $saveuser, $image, $imageName, $directory, $imgurl;
    public function index()
    {
        return  view('admin.user.user-roles', [
            'saveusers' => Saveuser::all()
        ]);
    }
    public function saveUser(Request $request)
    {
//        dd(request()->all());
        $this->saveuser = new Saveuser();
        $this->saveuser->name = $request->name;
        $this->saveuser->company = $request->company;
        $this->saveuser->email = $request->email;
        $this->saveuser->phone = $request->phone;
        $this->saveuser->designation = $request->designation;
        $this->saveuser->role = json_encode(request()->role);


        if ($request->hasFile('image')) {
            $this->saveuser->image = $this->saveImage($request);
        }
        $this->saveuser->save();
        return back()->with('message', 'Info save successfully');

        //        return $request;

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

    public function showUser()
    {
        return view('admin.user.showUser', [
            'saveusers' => Saveuser::all()
        ]);
    }
    public function edit($id)
    {
        $saveuser = saveUser::find($id);
        return view('admin.user.edit-User', compact('saveuser'));
    }
    public function update(Request $request, $id)
    {
        $this->saveuser = saveUser::find($id);
        $this->saveuser->name = $request->name;
        $this->saveuser->company = $request->company_name;
        $this->saveuser->phone = $request->phone;
        $this->saveuser->email = $request->email;
        $this->saveuser->designation = $request->designation;
        if ($request->hasFile('image')) {
            $this->saveuser->image = $this->saveImage($request);
        }
        $this->saveuser->update();
        return redirect()->route('dashboard.showUser');
    }

    public function delete($id)
    {
        $saveuser = saveUser::where('id', $id)->delete();
        return redirect()->route('dashboard.showUser');
    }
    public function details($id)
    {
        return view('admin.user.details-User', [
            'saveusers' => Saveuser::find($id)
        ]);
    }
}
