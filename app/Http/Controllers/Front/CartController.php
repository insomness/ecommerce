<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userID = auth()->user()->id;
        $carts = \Cart::session($userID)->getContent();
        return view('front.cart.index', compact('carts'));
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {
            $userID = auth()->user()->id;
            $product = Product::find($request->productId);

            // add the product to cart
            \Cart::session($userID)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [],
                'associatedModel' => $product,
            ]);

            return $this->_ajaxResponse($userID);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $userID = auth()->user()->id;
            $productId = $request->productId;
            $quantityChanged = $request->quantityChanged;

            \Cart::session($userID)->update($productId, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantityChanged
                ]
            ]);

            $cart = \Cart::session($userID)->get($productId);
            return response()->json(['cart' => $cart]);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $userID = auth()->user()->id;
            \Cart::session($userID)->remove($request->productId);

            return $this->_ajaxResponse($userID);
        }
    }

    public function clear()
    {
        $userID = auth()->user()->id;
        \Cart::session($userID)->clear();
        return redirect()->back()->with('status', 'Product has been deleted!');
    }

    private function _ajaxResponse($userID)
    {
        $carts = \Cart::session($userID)->getContent();
        $result = [];
        foreach ($carts as $cart) {
            $result[] = [
                'id' => $cart->id,
                'image' => $cart->associatedModel->image,
                'name' => $cart->name,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'associatedModel' => $cart->associatedModel,
            ];
        }

        $subTotal = \Cart::session(auth()->user()->id)->getSubTotal();
        return response()->json(['result' => $result, 'subTotal' => $subTotal]);
    }
}
