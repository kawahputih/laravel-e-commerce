<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;

class DashboardController extends LaravelController
{
    public function index(){
        return view('pages.backend.dashboard.index');
    }
}
