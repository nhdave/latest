<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use App\Update;

use App\Category;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('priority', 'dsc')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
      	$spacer = '&nbsp; &nbsp; &nbsp;';
        return view('projects.create', compact('categories', 'spacer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:55',
        'details' => 'required|min:15',
        'priority' => 'required|in:low,medium,high',
        'category_id' => 'required',
        ]);
        
        $project = new Project();
        $project->name = $request->input("name");
        $project->details = $request->input("details");
        $project->priority = $request->input("priority");
        $project->category_id = $request->input("category_id");
        $project->save();
        
        return redirect()->route('projects.index')->with('message', 'Project created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $spacer = '&nbsp; &nbsp; &nbsp;';
        return view('projects.edit', compact('project', 'categories', 'spacer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'priority' => 'required|in:low,medium,high',
        ]);
        
        $project->name = $request->input("name");
        $project->details = $request->input("details");
        $project->priority = $request->input("priority");
        $project->category_id = $request->input("category_id");
        $project->save();
        
        return redirect()->route('projects.edit', $project->id)->with('message', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        foreach ($project->updates as $update) {
            $update->delete();
        }
        $project->delete();
        
        return redirect()->route('projects.index')->with('message', 'Project deleted successfully.');
    }
}
