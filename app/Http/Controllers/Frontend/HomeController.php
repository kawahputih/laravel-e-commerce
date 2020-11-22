<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;

class HomeController extends LaravelController
{
    public function index(){
        return view('pages.frontend.home');
    }
}
