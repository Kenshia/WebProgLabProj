<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PurchaseHistory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    function addToCart(Request $request)
    {
        if (Auth::user()->id != $request->userId || $request->qty <= 0)
            return redirect('/home');

        $user = User::find($request->userId);
        $cart = explode(';', $user->cart);

        $index = -1;
        for ($i = 0; $i < count($cart); $i++) {
            if (strstr($cart[$i], $request->productId . ':')) {
                $index = $i;
                break;
            }
        }
        if ($index == -1)
            $user->cart = $user->cart . $request->productId . ':' . $request->qty . ';';
        else {
            $item = explode(':', $cart[$index]);
            $id = $item[0];
            $qty = $item[1];
            $qty = (int) $qty;
            $qty = $qty + $request->qty;
            $cart[$index] = $item[0] . ':' . $qty;
            $user->cart = join(';', $cart);
        }
        $user->save();

        return redirect('/home');
    }

    function removeFromCart(Request $request)
    {
        if (!Auth::check()) return redirect('/home');

        $productId = $request->route('id');
        $user = User::find(Auth::user()->id);
        $cart = explode(';', $user->cart);

        $index = -1;
        for ($i = 0; $i < count($cart); $i++) {
            if (strstr($cart[$i], $productId . ':')) {
                $index = $i;
                break;
            }
        }
        if ($index == -1) return redirect('/cart');
        unset($cart[$index]);

        $user->cart = join(';', $cart);
        $user->save();

        return redirect('/cart');
    }

    function purchase(Request $request)
    {
        if (Auth::user()->id != $request->userId || empty(Auth::user()->cart))
            return redirect('/home');

        $purchaseHistory = PurchaseHistory::create([
            'user_id' => $request->userId,
        ]);

        $user = User::find($request->userId);
        $cart = explode(';', $user->cart);

        foreach ($cart as $item) {
            if (empty($item)) continue;

            $item = explode(':', $item);
            $productId = $item[0];
            $qty = $item[1];

            Transaction::create([
                'purchase_history_id' => $purchaseHistory->id,
                'product_id' => $productId,
                'qty' => $qty
            ]);
        }

        $user->cart = "";
        $user->save();

        return redirect('/home');
    }

    // Checked with middleware 'admin'
    function manage()
    {
        return view('manage', [
            'products' => Product::all()
        ]);
    }

    function adminSearch(Request $request)
    {
        $name = $request->name;

        $products = Product::all(); // laravel doesn't have sql keyword LIKE and % doesn't work, wasted a lot of time there
        $result = array();
        foreach ($products as $product) {
            if (strstr(strtolower($product->name), strtolower($name)))
                array_push($result, $product);
        }

        return view('manage', [
            'products' => $result
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
            'image' => 'filled|mimes:jpeg,jpg,png'
        ]);
        // for some reason the enctype="multipart/form-data" in the form bypasses the request validation
        // while not using the enctype will result in wrong format for mimes:jpeg,jpg,png

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
            'image' => 'filled|mimes:jpeg,png'
        ]);
        // for some reason the enctype="multipart/form-data" in the form bypasses the request validation
        // while not using the enctype will result in wrong format for mimes:jpeg,jpg,png

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
        if (!Auth::check())
            return redirect('/home');
        return view('cart', [
            'user' => Auth::user()
        ]);
    }

    function history()
    {
        if (!Auth::check())
            return redirect('/home');
        return view('history', [
            'purchaseHistory' => User::find(Auth::user()->id)->purchaseHistory()
        ]);
    }
}
