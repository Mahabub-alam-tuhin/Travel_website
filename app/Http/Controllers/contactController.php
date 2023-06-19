<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public $create;
    public function create(){
      return view('admin.contact.create');
    }
    public function savecontact(Request $request)
    {
        $this->create = new contact();      
        $this->create->address = $request->address;
        $this->create->contact = $request->contact;
        $this->create->email = $request->email;
        $this->create->save();
        return back()->with('message', 'info create successfully');
        //       return $request;
    }

    public function view(){
      return view('admin.contact.view',[
          'contacts' => contact::all(),
      ]);
  }
  public function delete($id)
  {
      $contacts = contact::where('id', $id)->delete();
      return redirect()->route('admin.contact.view');
  }
}
// $table->text('address');
// $table->text('contact'); 
// $table->text('Email');