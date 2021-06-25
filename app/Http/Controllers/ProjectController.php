<?php

namespace App\Http\Controllers;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    //
    public function index(){
        $project = Projects::all();
        return view('admin.project.index',compact('project'));
    }
    public function create(){
        return view('admin.project.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:25',
            'description' => 'required|max:255',
            'cost' => 'required|max:10',
            'status' => 'required|max:15',
            'is_published' => 'required|max:1'
        ]);
        Projects::create($request->all());
        return redirect()->route('project.index');
    }

    public function edit($id){
        $project = Projects::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:25',
            'description' => 'required|max:255',
            'cost' => 'required|max:10',
            'status' => 'required|max:15',
            'is_published' => 'required|max:1'
        ]);
        Projects::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'status' => $request->status,
            'is_published' => $request->is_published
        ]);
        return redirect()->route('project.index');
    }

    public function destroy($id){
        Projects::findOrFail($id)->delete();
        return redirect()->back();
    }
}