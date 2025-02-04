<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    // public function index()
    // {
    //     //
    //     Category::all();
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     return view();
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        Category::create($request->validated());
        return redirect()->route('admin.categories')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        $category->update($request->validated());
        return redirect()->route('admin.categories')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories')->with('success','Category deleted successfully');
    }

}
