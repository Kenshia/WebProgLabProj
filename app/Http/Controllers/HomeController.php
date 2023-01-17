<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home()
    {
        return view('home', [
            'categories' => ProductCategory::all()
        ]);
    }

    function category(Request $request)
    {
        $name = $request->route('name');

        $category = ProductCategory::all()->where('name', '=', $name)->first();
        if (!$category)
            return redirect('/home');

        return view('category', [
            'name' => $category->name,
            'items' => DB::table('products')->where('product_category_id', '=', $category->id)->paginate(10)
        ]);
    }

    function product(Request $request)
    {
        $id = $request->route('id');

        $product = Product::all()->where('id', '=', $id)->first();
        if (!$product)
            return redirect('/home');

        return view('product', [
            'product' => $product
        ]);
    }
}
