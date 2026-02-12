@extends('admin.layout')


@section('content')

<h2 class="page-title">Admin – Order Status Control</h2>

<table class="orders-table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Update</th>
            <th>Details</th>
        </tr>
    </thead>

    <tbody>

    @isset($orders)
        @forelse($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'User' }}</td>
                <td>₹{{ number_format($order->total, 2) }}</td>

                <!-- STATUS UPDATE FORM -->
                <td>
                    <form method="POST" action="{{ route('admin.update.order.status') }}">
                        @csrf

                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <select name="status" required onchange="toggleDeliveryDate(this)">
                            <option value="packed" {{ $order->status == 'packed' ? 'selected' : '' }}>
                                Packed
                            </option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                Shipped
                            </option>
                            <option value="out_for_delivery" {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>
                                Out for Delivery
                            </option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                Delivered
                            </option>
                        </select>

                        <!-- DELIVERY DATE -->
                        <input type="datetime-local"
                               name="delivery_time"
                               class="delivery-time"
                               style="display:none; margin-top:6px;">

                        <br><br>

                        <button type="submit">Update</button>
                    </form>
                </td>

                <td>✔</td>

                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}"
                       class="action-btn secondary">
                        View Details
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center; color:#aaa;">
                    No orders found
                </td>
            </tr>
        @endforelse
    @else
        <tr>
            <td colspan="6" style="text-align:center; color:red;">
                Orders data not loaded
            </td>
        </tr>
    @endisset

    </tbody>
</table>

<script>
function toggleDeliveryDate(select) {
    const form = select.closest('form');
    const input = form.querySelector('.delivery-time');

    if (select.value === 'out_for_delivery') {
        input.style.display = 'block';
        input.required = true;
    } else {
        input.style.display = 'none';
        input.required = false;
        input.value = '';
    }
}
</script>

@endsection
