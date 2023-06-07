<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Cart::where('user_id',auth()->id())->whereNot('status',0)->get();

        return view('orders', compact('orders'));
    }
    public function orderCreate(Request $r)
    {
        if(is_null($r->password)) return back();

        if(!Hash::check($r->password,auth()->user()->password)) return back();

        $cart = Cart::query()->where('user_id',auth()->id())->where('status',0);

        foreach ($cart->get() as $c) {
            $product = Product::findOrFail($c->product_id);
            if($product->count < $c->quantity) return back();
            $product->decrement('count',$c->quantity);
        }

        $cart->update(['status' => 1]);

        return to_route('orders');
    }

    public function reject($id)
    {
        $order = Cart::find($id)->update(['status' => 3]);
    }

    public function submit($id)
    {
        $order = Cart::find($id)->update(['status' => 2]);
    }
}
