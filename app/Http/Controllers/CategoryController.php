<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();
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
        $articles = $category->articles()->get();
        if ($articles->count() > 0)
        {
            return view('articles.index', compact('articles'));
        }
        else
            return back()->with('message', 'There are no records for the category selected');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
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
     * @param  \App\Category  $category
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
