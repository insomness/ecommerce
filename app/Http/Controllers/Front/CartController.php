<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userID = auth()->user()->id;
        $items = \Cart::session($userID)->getContent();
        return view('front.cart.index', compact('items'));
    }

    public function store(Product $product)
    {
        $userID = auth()->user()->id;

        // add the product to cart
        \Cart::session($userID)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $product,
        ]);

        return redirect()->back()->with('status', 'Product has been added!');
    }

    public function destroy($id)
    {
        $userID = auth()->user()->id;
        \Cart::session($userID)->remove();
        return redirect()->back()->with('status', 'Product has been deleted!');
    }
}
