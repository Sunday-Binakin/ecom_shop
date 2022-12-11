<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function Dashboard()
    {
        return view('admin.layouts.dashboard');
    }
    public function ContactMessage()
    {
        return view('admin.layouts.messages');
    }

    public function CreateCategory()
    {
        return view('admin.layouts.create_category');
    }

}
