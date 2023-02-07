<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sub_categories = SubCategory::latest()->get();
        return view('admin.sub-category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sub-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        //
        $request->validated();

//calling the category name from the category table
        $category_name = Category::where('id', $request->category_id)->value('category_name');

        SubCategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'slug' => Str::slug($request->sub_category_name),
            'product_count' => 0,
            'category_id' => $request->category_id,
            'category_name' => $category_name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.sub.category.index')->with('success', 'SubCategory Added Successfully');
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
        $sub_category_info = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('sub_category_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubCategoryRequest $request, $id)
    {
        //
        $request->validated();
        SubCategory::findorfail($id)->update([
            'sub_category_name' => $request->sub_category_name,
            'slug' => Str::slug($request->sub_category_name),
        ]);
        return redirect()->route('admin.sub.category.index')->with('success', 'SubCategory Updated');

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
        SubCategory::Findorfail($id)->delete();
        return redirect()->route('admin.sub.category.index')->with('success', 'Deleted');
    }

    public function activate($id)
    {
        SubCategory::findorfail($id)->update([
            'status' => 'active',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.sub.category.index')->with('success', 'SubCategory Activated');
    }
    public function deactivate($id)
    {
        SubCategory::findorfail($id)->update([
            'status' => 'inactive',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.sub.category.index')->with('success', 'SubCategory Deactivated');
    }
}
 