<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        return view('home', [
            'categories' => ProductCategory::all()
        ]);
    }
    function category()
    {
        return view('category');
    }
}
