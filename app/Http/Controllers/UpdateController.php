<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Update;

class UpdateController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('updates.create');
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
        'name' => 'required|max:255',
        'details' => 'required',
        'project_id' => 'required',
        ]);
        
        $update = new Update();
        $update->name = $request->input("name");
        $update->details = $request->input("details");
        $update->project_id = $request->input("project_id");
        
        $update->save();
        
        return redirect()->route('projects.edit', $update->project_id)->with('message', 'Update created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        return view('updates.show', compact('update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        return view('updates.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'details' => 'required',
        'project_id' => 'required',
        ]);
        
        $update->name = $request->input("name");
        $update->details = $request->input("details");
        $update->project_id = $request->input("project_id");
        
        $update->save();
        
        return redirect()->route('projects.edit', $update->project_id)->with('message', 'Update updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        $update->delete();
        return redirect()->route('projects.edit', $update->project_id)->with('message', 'Update deleted successfully.');
    }
}
