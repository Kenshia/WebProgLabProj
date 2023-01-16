<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        return view('home', [
            'items' => Product::all()->take(10)
        ]);
    }
    function category()
    {
        return view('category');
    }
}
