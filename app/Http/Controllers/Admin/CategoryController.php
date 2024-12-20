<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $request->validated();
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            // 'slug'=>strtolower(str_replace('','-',$request->category_name)),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.category.index')->with('message', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category_info = Category::findOrFail($id);
        return view('admin.category.edit', compact('category_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        //
        $request->validated();
        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            // 'slug'=>strtolower(str_replace('','-',$request->category_name)),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.category.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.category.index')->with('message', 'Category Deleted Successfully');
    }

    public function deactivate($id)
    {
        Category::findOrFail($id)->update([
            'status' => 'inactive',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.category.index')->with('message', 'Category Deactivated Successfully');
    }
    public function activate(Request $request,$id)
    {
        // request was no needed here
        Category::findOrFail($id)->update([
            'status' => 'active',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.category.index')->with('message', 'Category Activated Successfully');
    }
}
