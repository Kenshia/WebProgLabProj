<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
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

        $imageName = (string)time() . '.' . $request->file('image')->extension();

        Product::create([
            'name' => $request->name,
            'product_category_id' => ProductCategory::all()->where('name', '=', $request->category)->first()->id,
            'detail' => $request->detail,
            'price' => $request->price,
            'image' => 'storage/' . $imageName
        ]);

        Storage::put('public/' . $imageName, file_get_contents($request->image));

        return redirect('/manage');
    }

    function update(Request $request)
    {
        $id = $request->route('id');
        $product = Product::find($id);
        if (!$product) return redirect('/manage');

        $categories = ProductCategory::all();
        $data = ['product' => $product];

        foreach ($categories as $category)
            $data[$category->name] = $category->id;

        return view('update', $data);
    }

    function postUpdate(Request $request)
    {
        $request->validate([
            'name' => 'filled',
            'category' => 'filled|not_in:Select a Category',
            'detail' => 'filled',
            'price' => 'filled|numeric',
            'image' => 'mimes:jpeg,png'
        ]);

        $imageName = (string)time() . '.' . $request->file('image')->extension();

        $product = Product::find($request->productId);
        $oldImage = str_replace("storage", "public", $product->image);

        $product->name = $request->name;
        $product->product_category_id = ProductCategory::all()->where('name', '=', $request->category)->first()->id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->image = 'storage/' . $imageName;
        $product->save();

        if (!strstr($oldImage, "DUMMY"))
            Storage::delete($oldImage);
        Storage::put('public/' . $imageName, file_get_contents($request->image));

        return redirect('/manage');
    }

    function delete(Request $request)
    {
        $id = $request->route('id');

        $imagePath = Product::find($id)->image;
        $imagePath = str_replace("storage", "public", $imagePath);
        if (!strstr($imagePath, "DUMMY"))
            Storage::delete($imagePath);

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
