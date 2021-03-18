<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisualizedController extends Controller
{
    public function index()
    {
        view()->share('_visualized', 'am-active');
        return view('admin.visualized.index');
    }
}
