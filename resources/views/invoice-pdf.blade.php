<!DOCTYPE html>
<html>
<head>
    <title>Invoice - Rider's Den</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<!-- PDF HEADER WITH LOGO -->
<div class="header">
    <h1>Rider's Den</h1>
    <h3>Invoice</h3>
</div>

<table>
    <tr><th>Order ID</th><td>{{ $order->id }}</td></tr>
    <tr><th>Customer Name</th><td>{{ $order->customer_name }}</td></tr>
    <tr><th>Email</th><td>{{ $order->email }}</td></tr>
    <tr><th>Address</th><td>{{ $order->address }}</td></tr>
    <tr><th>Payment Method</th><td>{{ strtoupper($order->payment_type) }}</td></tr>
    <tr><th>Payment Status</th><td>{{ strtoupper($order->payment_status) }}</td></tr>
</table>

<h3>Order Items</h3>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    @foreach($order->items as $item)
    <tr>
        <td>{{ $item->product_name }}</td>
        <td>₹{{ $item->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>₹{{ $item->price * $item->quantity }}</td>
    </tr>
    @endforeach
    <tr>
        <th colspan="3">Grand Total</th>
        <th>₹{{ $order->total }}</th>
    </tr>
</table>

</body>
</html>
