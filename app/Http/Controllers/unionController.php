<?php

namespace App\Http\Controllers;

use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class unionController extends Controller
{
    public $create, $Union;
    public function create()
    {
        return view('admin.union.create', [
            'unions' => Union::all(),
        ]);
    }

    public function union_by_upazila()
    {
        $upazilla_id = request()->upazilla_id;
        return response()->json(Union::where('upazilla_id',$upazilla_id)->get());
    }
    
    public function saveunion(Request $request)
    {
        $this->create = new Union();
        $this->create->upazilla_id = $request->upazilla_id;
        $this->create->name = $request->name;
        $this->create->bn_name = $request->bn_name;
        $this->create->url = $request->url;
        $this->create->save();
        return back()->with('message', 'info create successfully');
    }
    public function view()
    {
        $unions = union::paginate(10);
        return view('admin.union.view', [
            'unions' => $unions,
        ]);
    }
    public function edit($id)
    {
        $unions = union::all();
        $Union = Union::find($id);
        return view('admin.union.edit', compact('Union', 'unions'));
    }
    public function update(Request $request, $id)
    {
        $this->Union = Union::find($id);
        $this->Union->upazilla_id = $request->upazilla_id;
        $this->Union->name = $request->name;
        $this->Union->bn_name = $request->bn_name;
        $this->Union->url = $request->url;
        $this->Union->update();
        return redirect()->route('admin.union.view');
    }
    public function delete($id)
    {
        $Union = Union::where('id', $id)->delete();
        return redirect()->route('admin.union.view');
    }
}
