@if ($orders)
<table class="cart-table">
    <thead>
        <tr>
            {{-- <th>#</th> --}}
            <th>Product</th>
            <th>Product name</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key => $order)
        <tr>
            <td>
                <a href="{{ route('get.detail.product', [str_slug($order->product->pro_name), $order->or_]) }}"><img src="{{ isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : '' }}" class="img-responsive" alt=""/></a>
            </td>
            <td>
                <h6><a href="" target="_blank">{{ isset($order->product->pro_name) ? pare_url_file($order->product->pro_name) : '' }}</a></h6>
            </td>
            <td>
                <div class="cart-price">{{ number_format($order->or_price,'0','','.',).' VND' }}</div>
            </td>
            <td>{{ $order->or_qty }}</td>
            <td>
                <div class="cart-subtotal">{{ number_format($order->or_qty * $order->or_price,'0','','.',).' VND' }}</div>
            </td>
            <td><a href=""><i class="fa fa-times"></i></a></td>
        </tr>
        @endforeach
        <tr>
            <td class="actions-crt" colspan="5"><h4>Total order amount</h4></td>
            <td class="actions-crt" colspan="2">
                <h5>{{ Cart::subtotal(0, 3) }} VND</h5>
            </td>
        </tr>
    </tbody>
</table>
@endif