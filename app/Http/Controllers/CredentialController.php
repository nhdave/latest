<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Credential;

use App\Category;

class CredentialController extends Controller
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
        $credentials = Credential::orderBy('name', 'dsc')->paginate(10);
        return view('credentials.index', compact('credentials'));
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
        return view('credentials.create', compact('categories', 'spacer'));
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
        'category_id' => 'required',
        ]);
        
        $credential = new Credential();
        $credential->fill($request->all());
        $credential->save();
        return redirect()->route('credentials.edit', $credential->id)->with('message', 'Credential created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Credential $credential)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Credential $credential)
    {
        $credentials = Credential::all();
        $links = $credential->links;
        $categories = Category::all();
        $spacer = '&nbsp; &nbsp; &nbsp;';
       return view('credentials.edit', compact('credential', 'categories', 'links', 'credentials', 'spacer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credential $credential)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'category_id' => 'required',
        ]); 
        $credential->fill($request->all());
        $credential->save();
        return redirect()->route('credentials.edit', $credential->id)->with('message', 'Credential created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credential $credential)
    {
        $links = $credential->links();
        foreach ($links as $link) {
            $link->delete();
        }
        $credential->delete();
        return back()->with('message', 'Credential deleted successfully');
    }
}
