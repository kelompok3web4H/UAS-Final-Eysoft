<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Models\Messages;
use App\Models\Projects;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $project = Projects::where('is_published', 1)->get();
        return view('user.home.index',compact('project'));
    }

    public function store(Request $request){
        $request->validate([
            'fullname' => 'required|min:5|max:35',
            'email' => 'required|min:5|max:45',
            'message' => 'required|max:255'
        ]);
        Messages::create($request->all());
        return redirect()->refresh()->with('flash_success', 'message sent');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
}