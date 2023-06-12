<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->get();

        return view('orders', compact('orders'));
    }
    public function orderCreate(Request $r)
    {
        if(is_null($r->password)) return back()->withErrors('Поле пустое!');

        if(!Hash::check($r->password,auth()->user()->password)) return back()->withErrors('Неверный пароль!');

        $cart = Cart::query()->where('user_id',auth()->id())->where('in_order', false);

        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 0,
        ]);

        $order->carts()->syncWithoutDetaching($cart->pluck('id'));

        foreach ($cart->get() as $c) {
            $product = Product::findOrFail($c->product_id);
            if($product->count < $c->quantity) return back()->withErrors('Нет такого кол-ва!');
            $product->decrement('count',$c->quantity);
        }

        $cart->update(['in_order' => true]);

        return to_route('orders');
    }
    public function submit($id)
    {
        $order = Order::find($id)->update(['status' => 1]);

        return back();
    }
    public function deleteOrder($id)
    {
        $order = Order::find($id);

        foreach($order->carts as $c){
            $product = Product::findOrFail($c->product_id);
            $product->increment('count',$c->quantity);
            $c->delete();
        }
        $order->delete();
        return back();
    }
}
