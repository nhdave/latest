<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class CategoryController extends Controller
{
    private $categories;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->categories = Category::all();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories;
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSub($parentId)
    {
        $id = $parentId;
        return view('categories.createSub', compact('id'));
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
        ]);
        
        $category = new Category();

        $category->name = $request->input("name");
        $category->parent_id = $request->input("parent_id");

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $projects = $category->projects()->paginate(10);
        $credentials = $category->credentials()->paginate(10);
        if ($projects->count() > 0)
        {
            return view('projects.index', compact('projects'));
        }
        else if($credentials->count() > 0)
        {
            return view('categories.credentials', compact('credentials', 'category'));
        }
        else
            return back()->with('message', 'There are no records for the category selected');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Category::where('parent_id', $category->id)->count())
        {
            $children = Category::where('parent_id', $category->id)->get();
            foreach ($children as $child) {
                $this->destroy($child);
            }
        }
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category deleted successfully.');
    }
    
}
