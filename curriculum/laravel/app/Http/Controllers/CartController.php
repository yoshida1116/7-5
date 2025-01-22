<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
        ]);

        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $validated['product_id'])
            ->where('size', $validated['size'])
            ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'size' => $validated['size'],
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $carts = $this->getUserCart();
        $total = $carts->sum(function ($item) {
            return intval(($item->product->val * 1.1) * $item->quantity);
        });

        return view('cart', compact('carts', 'total'));
    }

    public function delete($id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cart) {
            $cart->delete();
            return redirect()->route('cart.index')->with('success', 'カートから商品を削除しました。');
        }

        return redirect()->route('cart.index')->with('error', '商品が見つかりませんでした。');
    }

    private function getUserCart()
    {
        return Cart::where('user_id', auth()->id())
        ->with('product:id,name,val')
        ->get();
    }
}
