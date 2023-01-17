<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    function purchase(Request $request)
    {
        PurchaseHistory::create([
            'user_id' => $request->userId,
            'product_id' => $request->productId,
            'qty' => $request->qty
        ]);

        return redirect('/home');
    }

    // Checked with middleware 'admin'
    function manage()
    {
        return view('manage', [
            'products' => Product::all()
        ]);
    }

    function viewAddProduct()
    {
        return view('addproduct');
    }

    function submitAddProduct(Request $request)
    {
        $request->validate([
            'name' => 'filled',
            'category' => 'filled|not_in:Select a Category',
            'detail' => 'filled',
            'price' => 'filled|numeric',
            'image' => 'mimes:jpeg,png'
        ]);



        return redirect('/manage');
    }

    function update()
    {
        return view('update');
    }

    function delete(Request $request)
    {
        $id = $request->route('id');
        Product::destroy($id);
        return redirect('/manage');
    }
    //
    function cart()
    {
        return view('cart');
    }

    function history()
    {
        return view('history');
    }
}
