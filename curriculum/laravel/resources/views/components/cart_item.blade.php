<div class="w-layout-vflex flex-block-3" style="width: 400px;">
    <tr>
        <img src="{{ $product['picture'] }}" sizes="80px" class="image-5">
        <a href="{{ route('item', $product->id) }}" class="link-11">{{ $product['name'] }}</a>
        <div class="text-block-5">
            ￥{{ number_format($product['val'] * 1.1) }}（税込み）
        </div>
    </tr>
    @if (isset($delete) && $delete)
        <a href="{{ route('cart.delete', $product->id) }}" class="link-12">削除</a>
    @endif
</div>
@if (isset($delete) && $delete)
    <div class="w-layout-blockcontainer container-24 w-container">
        <a href="#">
            <img src="img/スタンダードなゴミ箱アイコン.png" class="image-7">
        </a>
    </div>
@endif
