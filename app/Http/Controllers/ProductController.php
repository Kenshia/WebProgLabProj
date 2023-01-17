<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use Illuminate\Http\Request;

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

    function edit(Request $request)
    {
    }

    function add(Request $request)
    {
    }
}
