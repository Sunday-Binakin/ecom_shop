<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandsRequest;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brand_info = Brand::latest()->get();
        return view('admin.brands.index', compact('brand_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandsRequest $request)
    {
        //
        $request->validated();
        Brand::insert([
            'brand_name' => $request->brand_name,
            'slug' =>Str::slug($request->slug),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Created Successfully');

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
        $brand_info = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Brand::findOrFail($id)->update([
            'brand_name' => $request->brand_name,
            'slug' =>Str::slug($request->slug),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Updated Successfully');
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
        Brand::findOrFail($id)->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand Deleted Successfully');
    }

    public function activate($id)
    {
        //
        Brand::findOrFail($id)->update([
            'status' => 'active',
            'updated_at' => Carbon::now(),

        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Activated Successfully');
    }

    public function deactivate($id)
    {
        //
        Brand::findOrFail($id)->update([
            'status' => 'inactive',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Deactivated Successfully');
    }
}
