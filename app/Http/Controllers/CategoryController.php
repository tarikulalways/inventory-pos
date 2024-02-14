<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest('id')->withCount('product')->get();
        return view('admin.pages.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required'
        ]);

        $store = Category::create([
            'categoryName' => $request->input('categoryName'),
            'categorySlug' => Str::slug($request->input('categoryName'))
        ]);
        session()->flash('store', 'Category Added Successfull!');
        return redirect()->route('create.category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'categoryName' => $request->input('categoryName'),
            'categorySlug' => Str::slug($request->input('categoryName'))
        ]);
        session()->flash('update', 'Category Update Successfull!');
        return redirect()->route('index.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('destroy', 'Category Delete Successfull!');
        return redirect()->route('index.category');
    }
}
