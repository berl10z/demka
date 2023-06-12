<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->where('in_order', false)->orderBy('id', 'desc')->get();
        return view('cart', compact('carts'));
    }
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Cart::where('user_id', auth()->id())->where('product_id', $productId)->where('in_order', false)->first();

        if ($cart) {
            if ($cart->quantity >= $product->count) {
                return back()->withErrors(['error' => 'Нет такого количества']);
            }
            $cart->increment('quantity', 1);
            return to_route('cart');
        }
        Cart::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => 1
        ]);
        return to_route('cart');
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
        Cart::find($id);

        Cart::destroy($id);

        return back()->with('success', 'Товар удалён из корзины');
    }
}
