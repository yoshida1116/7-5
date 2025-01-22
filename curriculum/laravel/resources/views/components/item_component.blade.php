<div class="w-layout-vflex" margin-left="50px">
    <tr>
        <img src="{{ $product['picture'] }}" sizes="(max-width: 767px) 37vw, 200px" class="image">
        <h2 class="heading-2">
            <a href="{{ route('item', $product->id) }}">{{ $product['name'] }}</a>
        </h2>
        <h2 class="heading-2">
            <td>￥{{ number_format($product['val'] * 1.1) }}（税込み）</td>
        </h2>
    </tr>
</div>
