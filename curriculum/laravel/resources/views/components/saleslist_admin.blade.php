<div>
    <div id="w-node-_9861fc3d-c6c1-6ec9-f263-9439fcac83e9-26605386" class="w-layout-layout quick-stack-2 wf-layout-layout"
        style="width: 2000px;">
        <div class="w-layout-cell">
            <div>ID</div>
        </div>
        <div class="w-layout-cell">
            <div>商品ID</div>
        </div>
        <div class="w-layout-cell">
            <div>商品名</div>
        </div>
        <div class="w-layout-cell">
            <div>税抜き値段</div>
        </div>
        <div class="w-layout-cell">
            <div>ユーザーID</div>
        </div>
        <div class="w-layout-cell cell">
            <div>購入日時</div>
        </div>


        <div class="w-layout-cell">
            <div>{{ $sale->id }}</div>
        </div>
        <div class="w-layout-cell">
            <div>{{ $sale->product_id }}</div>
        </div>
        <div class="w-layout-cell">
            <div>{{ $sale->product->name }}</div>
        </div>
        <div class="w-layout-cell">
            <div>￥{{ number_format($sale->product->val * 1.1) }}</div>
        </div>
        <div class="w-layout-cell">
            <div>{{ $sale->user_id }}</div>
        </div>
        <div class="w-layout-cell">
            <div>{{ $sale->purchase_at }}</div>
        </div>
    </div>
</div>
