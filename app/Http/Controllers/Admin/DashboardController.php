<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function ContactMessage()
    {
        return view('admin.messages');
    }

    public function CreateCategory()
    {
        return view('admin.create_category');
    }
    public function AllCategory()
    {
        return view('admin.all_category');
    }
    public function CreateSubCategory()
    {
        return view('admin.create_subcategory');
    }
    public function AllSubCategory()
    {
        return view('admin.all_subcategory');
    }
    public function CreateBrands()
    {
        return view('admin.create_brands');
    }
    public function AllBrands()
    {
        return view('admin.all_brands');
    }

}
