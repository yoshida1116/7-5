@extends('layouts.app_login')
@section('content')
    <section class="section-5">
        <h1 class="heading-21">ADMIN画面</h1>
        <div class="div-block-8">
            <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="button-9 w-button" style="margin-right:50px;">ログアウト</button>
            </form>
        </div>
    </section>
    <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
        <div class="w-tab-menu">
            <a href="{{ route('admin') }}"
                class="tab-link-tab-1 w-inline-block w-tab-link {{ request()->get('tab') !== 'sales' ? 'w--current' : '' }}"
                data-w-tab="Tab 1">
                <div>商品管理</div>
            </a>
            <a href="{{ route('admin') }}?tab=sales"
                class="tab-link-tab-2 w-inline-block w-tab-link {{ request()->get('tab') === 'sales' ? 'w--current' : '' }}"
                data-w-tab="Tab 2">
                <div>売上管理</div>
            </a>
            <a data-w-tab="Tab 3" class="tab-link-tab-3 w-inline-block w-tab-link">
                <div>ユーザー管理</div>
            </a>
        </div>
        <div class="w-tab-content">
            <div data-w-tab="Tab 1" class="w-tab-pane {{ request()->get('tab') !== 'sales' ? 'w--tab-active' : '' }}">
                <div class="w-layout-blockcontainer w-container">
                    <h1>■商品管理</h1>
                    <div class="div-block-8">
                        <a href="{{ route('admin.item.edit') }}" class="button-9 w-button">新規追加</a>
                    </div>
                </div>
                <section>
                    <div class="product-grid">
                        @foreach ($products as $product)
                            <div class="product-item">
                                <x-item_component :product="$product" />
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div data-w-tab="Tab 2" class="w-tab-pane {{ request()->get('tab') === 'sales' ? 'w--tab-active' : '' }}">
                <div class="w-layout-blockcontainer w-container">
                    <h1>■売上管理</h1>
                </div>
                <section>
                    <div class="product-grid" style="display: flex; flex-wrap: wrap; gap: 10px;">
                        @foreach ($sales as $sale)
                            <div class="product-item" style="width: 2000px;">
                                <x-saleslist_admin :sale="$sale" />
                            </div>
                        @endforeach
                </section>
            </div>
            <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                <div class="w-layout-blockcontainer w-container">
                    <h1>■ユーザー管理</h1>
                    <div class="div-block-8">
                        <a href="adminuseredit" class="button-9 w-button">新規追加</a>
                    </div>
                </div>
                <section>
                    <x-userlist_admin />
                </section>
            </div>
        </div>
    </div>
@endsection
