@extends('layouts.app')
@section('content')
    <div class="w-layout-blockcontainer container-25 w-container">
        <div class="w-layout-blockcontainer w-container">
            <h1 class="heading-16">■カート内容</h1>
        </div>
        <ul role="list" class="w-list-unstyled">
            @foreach ($carts as $cart)
                <li class="list-item">
                    <x-cart_item :product="$cart->product" :size="$cart->size" :quantity="$cart->quantity" :delete="true" />
                </li>
            @endforeach
        </ul>
    </div>

    <div class="w-layout-blockcontainer w-container">
        <h1 class="heading-16">商品合計 ￥{{ number_format($total) }}（税込み）</h1>
    </div>

    <div class="w-layout-blockcontainer container-27 w-container">
        <div class="w-layout-blockcontainer container-27 w-container">
            <a href="/" class="button-4 w-button">戻る</a>
            <!-- Stripe決済ボタン -->
            <form action="{{ route('payment') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="total" value="{{ $total }}">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="{{ $total }}" data-name="Stripe決済" data-label="決済をする" data-description="これはデモ決済です"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
                </script>
            </form>
        </div>
    @endsection
