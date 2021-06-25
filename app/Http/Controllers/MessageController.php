<?php

namespace App\Http\Controllers;
use App\Models\Messages;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    //
    public function index(){
        $message = Messages::all();
        return view('admin.message.index',compact('message'));
    }

    public function store(Request $request){
        $request->validate([
            'fullname' => 'required|max:30',
            'email' => 'required|max:30',
            'message' => 'required|max:255'
        ]);
        Messages::create($request->all());
        return redirect()->route('user.home.index');
    }

    public function destroy($id){
        Messages::findOrFail($id)->delete();
        return redirect()->back();
    }
}