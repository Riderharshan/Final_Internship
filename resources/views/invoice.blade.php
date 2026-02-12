@extends('layout.app')

@section('content')

<div class="container-fluid px-2 px-md-5 pt-3 pb-4">


<div class="invoice-wrapper reveal delay-1 mx-auto">


    <!-- HEADER -->
    <div class="invoice-header reveal delay-2 text-center">
        <img src="{{ asset('images/web-logo.png') }}" 
             alt="Rider's Den Logo"
             class="img-fluid mb-2"
             style="max-width:80px;">
        <h1 class="fw-bold text-danger">Rider's Den</h1>
        <p class="invoice-subtitle reveal delay-3 text-danger">Invoice</p>
    </div>

    <div class="divider reveal delay-1 my-4"></div>

    <!-- ORDER DETAILS -->
    <div class="invoice-card card bg-black border-danger shadow-lg mb-4">
        <div class="card-body p-3 p-md-4">

        <div class="table-responsive">
        <table class="invoice-table table table-dark align-middle mb-0">
            <tbody>
            <tr>
                <th class="w-50 text-danger">Invoice No</th>
                <td class="text-end text-white">RD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <th class="text-danger">Order Date</th>
                <td class="text-end text-white">{{ $order->created_at->format('d M Y, h:i A') }}</td>
            </tr>
            <tr>
                <th class="text-danger">Customer Name</th>
                <td class="text-end text-white">{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <th class="text-danger">Email</th>
                <td class="text-end text-white">{{ $order->email }}</td>
            </tr>
            <tr>
                <th class="text-danger">Phone</th>
                <td class="text-end text-white">{{ $order->phone }}</td>
            </tr>
            <tr>
                <th class="text-danger">Address</th>
                <td class="text-end text-white">{{ $order->address }}</td>
            </tr>
            <tr>
                <th class="text-danger">Payment Method</th>
                <td class="text-end text-white">{{ strtoupper($order->payment_type) }}</td>
            </tr>
            <tr>
                <th class="text-danger">Payment Status</th>
                <td class="text-success fw-bold text-end">PAID</td>
            </tr>
            </tbody>
        </table>
        </div>

        </div>
    </div>

    <div class="divider my-4"></div>

    <!-- ORDER ITEMS -->
    <div class="invoice-card card bg-black border-danger shadow-lg mb-4">
        <div class="card-body p-3 p-md-4">

        <h3 class="section-title mb-3 text-danger fw-bold">Order Items</h3>

        <div class="table-responsive">
        <table class="invoice-items table table-dark align-middle text-center mb-0">
            <thead>
                <tr class="border-bottom border-danger">
                    <th class="text-start text-danger">Product</th>
                    <th class="text-danger">Price</th>
                    <th class="text-danger">Qty</th>
                    <th class="text-danger">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order->items as $item)
                <tr class="border-bottom border-danger">
                    <td class="text-start text-white text-wrap">
                        {{ $item->product_name }}
                    </td>
                    <td class="text-white">₹{{ number_format($item->price, 2) }}</td>
                    <td class="text-white">{{ $item->quantity }}</td>
                    <td class="text-white">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="border-top border-danger">
                    <th colspan="3" class="text-end text-danger">Grand Total</th>
                    <th class="text-danger">₹{{ number_format($order->total, 2) }}</th>
                </tr>
            </tfoot>
        </table>
        </div>

        </div>
    </div>

    <div class="divider my-4"></div>

    <!-- ACTION BUTTONS -->
    <div class="invoice-actions d-flex flex-column flex-md-row justify-content-center gap-3">

        <button onclick="window.print()" 
                class="btn btn-danger px-4">
            <i class="fa fa-print me-2"></i> Print
        </button>

        <a href="/invoice/{{ $order->id }}/download" 
           class="btn btn-danger px-4">
            <i class="fa fa-download me-2"></i> Download PDF
        </a>

        <a href="/" 
           class="btn btn-danger px-4">
            <i class="fa fa-home me-2"></i> Back to Home
        </a>

    </div>

</div>

</div>

@endsection
