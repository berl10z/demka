<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->where('status', 0)->orderBy('id', 'desc')->get();
        $orders = Cart::where('user_id', auth()->id())->where('status', '!=', 0)->get();

        return view('cart', compact('carts', 'orders'));
    }
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Cart::where('user_id', auth()->id())->where('product_id', $productId)->where('status', '<=', 0)->first();

        if ($cart) {
            if ($cart->quantity >= $product->count) {
                return back()->withErrors(['error' => 'Нет такого количества']);
            }
            $cart->increment('quantity', 1);
            return back();
        }
        Cart::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => 1
        ]);
        return back();
    }
    public function removeFromCart($id)
    {
        $cart = Cart::find($id);
        $cart->decrement('quantity',1);
        if($cart->quantity < 1) {
            $cart->delete();
        }
        return back();
    }
    public function deleteFromCart($id)
    {
        $cart = Cart::find($id);

        Cart::destroy($id);

        return back()->with('success', 'Товар удалён из корзины');
    }
}
