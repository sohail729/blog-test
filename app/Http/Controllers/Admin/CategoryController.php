<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id')->toArray();
        return view('admin.category.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {

        $category = new Category;
        $category->parent_id = $request->parent_id;                
        $category->title = $request->title;                
        $category->slug = $request->slug;                
        $category->description = $request->description;                
        $category->in_header = $request->in_header ?? 0;                
        $category->in_footer = $request->in_footer ?? 0;                
        $category->save();
        if($category){
            $request->session()->flash('alert-success', 'New category created successfully!');
            return redirect()->back();            
        }
        $request->session()->flash('alert-danger', 'Something went wrong!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::pluck('title','id')->toArray();
        return  view('admin.category.modal.edit', compact('category', 'categories'))->render();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->parent_id = $request->parent_id;                
        $category->title = $request->title;                
        $category->slug = $request->slug;                
        $category->description = $request->description;  
        $category->in_header = $request->in_header ?? 0;                
        $category->in_footer = $request->in_footer ?? 0;                
        $category->save();
        if($category){
            $request->session()->flash('alert-success', 'Category updated successfully!');
            return redirect()->back();            
        }
        $request->session()->flash('alert-danger', 'Something went wrong!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            $category->children()->delete();
            $category->posts()->delete();
            return true;
        }
        return false;
    }
}
