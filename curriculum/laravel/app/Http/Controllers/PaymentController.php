<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;
use App\Models\Cart;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $total = $request->input('total');

        try {
            // Stripeで決済を実行
            $charge = Charge::create([
                'amount' => $total,
                'currency' => 'jpy',
                'source' => $request->input('stripeToken'),
                'description' => '購入代金',
            ]);

            // カートの内容をセール情報に保存
            foreach ($cartItems as $cartItem) {
                Sale::create([
                    'product_id' => $cartItem->product_id,
                    'user_id' => Auth::id(),
                    'purchase_at' => now(),
                    'val' => $cartItem->product->val * $cartItem->quantity * 1.1,
                ]);
            }

            // カートをクリア
            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('payment.complete')->with('success', '支払いが完了しました。');

        } catch (\Exception $e) {
            \Log::error('Stripe決済エラー: ' . $e->getMessage());
            return back()->withErrors(['error' => '支払いに失敗しました。もう一度お試しください。']);
        }
    }
}
