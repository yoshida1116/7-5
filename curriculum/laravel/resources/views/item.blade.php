@extends('layouts.app')
@section('content')
    <div id="w-node-_70fc2f60-eebe-06fa-5f10-7db86abd4630-862eed34" class="w-layout-layout wf-layout-layout container-item">
        <div id="w-node-f77c6ce3-7280-b5af-e927-fd62fe027efb-862eed34" class="w-layout-cell">
            <img src="{{ asset($product->picture) }}" loading="lazy" sizes="100vw" class="image-3">
        </div>
        <div id="w-node-_0effb395-4563-c85e-c5da-528ac83e50ce-862eed34" class="w-layout-cell">
            <div class="w-layout-vflex flex-block">
                <h1 class="heading-13">{{ $product->name }}</h1>
                <div class="text-block">
                    <p>価格: ￥{{ number_format($product->val * 1.1) }}（税込み）</p>
                </div>
                <p class="paragraph">説明: {{ $product->explanation }}</p>
            </div>
        </div>
        <div id="w-node-_661bc7f5-d78e-ac14-d24f-cf1bde5ce7da-862eed34" class="w-layout-cell">
            <h1 class="heading-12">■サイズ選択</h1>
            <div class="w-layout-hflex">
                <h1 class="heading-11">S</h1>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="size" value="S">
                    <button type="submit" class="button w-button">カートに追加する</button>
                </form>
            </div>
            <div class="w-layout-hflex">
                <h1 class="heading-10">M</h1>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="size" value="M">
                    <button type="submit" class="button w-button">カートに追加する</button>
                </form>
            </div>
            <div class="w-layout-hflex">
                <h1 class="heading-9">L</h1>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="size" value="L">
                    <button type="submit" class="button w-button">カートに追加する</button>
                </form>
            </div>
            <div class="w-layout-hflex">
                <h1 class="heading-14">XL</h1>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="size" value="XL">
                    <button type="submit" class="button w-button">カートに追加する</button>
                </form>
            </div>
        </div>
    </div>
@endsection
