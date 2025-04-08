<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class HomeController extends AdminController
{
    protected $pageActive = 'dashboard';
    protected $pageTitle = 'Home';
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }
}
