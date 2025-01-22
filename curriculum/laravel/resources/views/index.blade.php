@extends('layouts.app')
@section('content')
    {{-- デバッグ用 --}}
    @if (Auth::check())
        {{ Auth::user()->name }}
    @endif
    <h1 class="heading">Welcome to Educure apparel shop</h1>
    <section class="section-2">
        <div class="w-layout-blockcontainer w-container">
            <h1 class="heading-5">■新規商品</h1>
        </div>
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-item">
                    <x-item_component :product="$product" />
                </div>
            @endforeach
        </div>
        <div class="w-layout-blockcontainer w-container">
            <a href="itemlist" class="link">&lt;他の商品を見る</a>
        </div>
    </section>
    <section class="section-4">
        <div class="w-layout-blockcontainer container-4 w-container">
            <h1 class="heading-6">■ジャンル</h1>
        </div>
        <div class="w-layout-blockcontainer container-3 w-container">
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/t-shirt.png" class="image-2">
                    <a href="itemlist" class="link-2">Tシャツ</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/y-shirt.png" class="image-2">
                    <a href="itemlist" class="link-2">Yシャツ</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/shirt.png"class="image-2">
                    <a href="itemlist" class="link-2">セーター</a>
                </div>
            </div>
        </div>
        <div class="w-layout-blockcontainer container-3 w-container">
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/long.png"class="image-2">
                    <a href="itemlist" class="link-2">ロング</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/coat.png"class="image-2">
                    <a href="itemlist" class="link-2">コート</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/jacket.png"class="image-2">
                    <a href="itemlist" class="link-2">ジャケット</a>
                </div>
            </div>
        </div>
        <div class="w-layout-blockcontainer container-3 w-container">
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/pants.png"class="image-2">
                    <a href="itemlist" class="link-2">パンツ</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/shoes.png"class="image-2">
                    <a href="itemlist" class="link-2">シューズ</a>
                </div>
            </div>
            <div class="w-layout-blockcontainer container1 w-container">
                <div class="div-block">
                    <img src="img/accessory.png"class="image-2">
                    <a href="itemlist" class="link-2">アクセサリー</a>
                </div>
            </div>
        </div>
    </section>
@endsection
