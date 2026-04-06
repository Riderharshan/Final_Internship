@extends('layout.app')

@push('styles')
<style>
/* ============================================================
   INVOICE PAGE – Inline Styles
   Theme: Black / Red — Rider's Den
============================================================ */

/* ── Page wrapper ── */
.invoice-page {
    max-width: 820px;
    margin: 0 auto;
    padding: 36px 20px 60px;
}

/* ── Invoice document card ── */
.invoice-doc {
    background: #0f0f0f;
    border: 1px solid rgba(255, 0, 0, 0.45);
    border-radius: 18px;
    overflow: hidden;
    box-shadow:
        0 0 60px rgba(255, 0, 0, 0.12),
        0 8px 40px rgba(0, 0, 0, 0.7);
}

/* ── Header band ── */
.invoice-doc__head {
    background: linear-gradient(135deg, #1a0000 0%, #0a0a0a 60%, #1a0000 100%);
    border-bottom: 1px solid rgba(255, 0, 0, 0.35);
    padding: 36px 40px 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    overflow: hidden;
}

/* Decorative glow orb behind header */
.invoice-doc__head::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 240px;
    height: 240px;
    background: radial-gradient(circle, rgba(255, 0, 0, 0.18) 0%, transparent 70%);
    pointer-events: none;
}

.invoice-brand {
    display: flex;
    align-items: center;
    gap: 16px;
}

.invoice-brand__logo {
    width: 60px;
    height: 60px;
    object-fit: contain;
    filter: drop-shadow(0 0 12px rgba(255, 0, 0, 0.6));
}

.invoice-brand__name {
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: 0.5px;
}

.invoice-brand__tagline {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.4);
    margin: 2px 0 0;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* INVOICE badge on the right */
.invoice-badge {
    text-align: right;
}

.invoice-badge__title {
    font-size: 32px;
    font-weight: 900;
    color: red;
    letter-spacing: 2px;
    text-transform: uppercase;
    line-height: 1;
    margin: 0;
}

.invoice-badge__number {
    font-size: 13px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.5);
    margin-top: 4px;
    letter-spacing: 0.5px;
}

/* ── Info grid section ── */
.invoice-doc__info {
    padding: 32px 40px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    border-bottom: 1px solid rgba(255, 0, 0, 0.18);
}

.invoice-info-group {
    padding: 0 20px 0 0;
}

.invoice-info-group:last-child {
    padding: 0 0 0 20px;
    border-left: 1px solid rgba(255, 0, 0, 0.15);
}

.invoice-info-group__title {
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: red;
    margin: 0 0 14px;
    display: flex;
    align-items: center;
    gap: 7px;
}

.invoice-info-group__title i {
    font-size: 11px;
    opacity: 0.8;
}

.invoice-info-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
    padding: 7px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
}

.invoice-info-row:last-child {
    border-bottom: none;
}

.invoice-info-row__label {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.45);
    white-space: nowrap;
    flex-shrink: 0;
}

.invoice-info-row__value {
    font-size: 13px;
    font-weight: 600;
    color: #f0f0f0;
    text-align: right;
    word-break: break-word;
}

/* PAID badge */
.invoice-paid-badge {
    display: inline-block;
    padding: 3px 12px;
    background: rgba(46, 204, 113, 0.12);
    border: 1px solid #2ecc71;
    color: #2ecc71;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

/* ── Items table section ── */
.invoice-doc__items {
    padding: 32px 40px;
    border-bottom: 1px solid rgba(255, 0, 0, 0.18);
}

.invoice-section-title {
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: red;
    margin: 0 0 18px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.invoice-items-table {
    width: 100%;
    border-collapse: collapse;
}

.invoice-items-table thead th {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: rgba(255, 0, 0, 0.75);
    padding: 10px 12px;
    background: rgba(255, 0, 0, 0.05);
    border-top: 1px solid rgba(255, 0, 0, 0.2);
    border-bottom: 1px solid rgba(255, 0, 0, 0.2);
}

.invoice-items-table thead th:first-child {
    border-radius: 8px 0 0 8px;
    text-align: left;
}

.invoice-items-table thead th:last-child {
    border-radius: 0 8px 8px 0;
    text-align: right;
}

.invoice-items-table tbody td {
    padding: 12px 12px;
    font-size: 13px;
    color: #e0e0e0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    vertical-align: middle;
}

.invoice-items-table tbody td:first-child {
    text-align: left;
    font-weight: 600;
}

.invoice-items-table tbody td:not(:first-child) {
    text-align: right;
}

.invoice-items-table tbody tr:last-child td {
    border-bottom: none;
}

.invoice-items-table tbody tr:hover td {
    background: rgba(255, 0, 0, 0.03);
}

/* Product thumbnail in table */
.invoice-item-thumb {
    width: 38px;
    height: 38px;
    object-fit: contain;
    background: #000;
    border: 1px solid rgba(255, 0, 0, 0.3);
    border-radius: 7px;
    padding: 3px;
    margin-right: 10px;
    vertical-align: middle;
}

/* ── Grand total row ── */
.invoice-total-bar {
    margin-top: 12px;
    background: linear-gradient(90deg, rgba(255,0,0,0.08) 0%, rgba(255,0,0,0.03) 100%);
    border: 1px solid rgba(255, 0, 0, 0.25);
    border-radius: 10px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.invoice-total-bar__label {
    font-size: 13px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.invoice-total-bar__amount {
    font-size: 22px;
    font-weight: 900;
    color: red;
    letter-spacing: 0.5px;
}

/* ── Footer / actions ── */
.invoice-doc__footer {
    padding: 24px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    background: rgba(0, 0, 0, 0.3);
}

.invoice-footer-note {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.3);
    line-height: 1.6;
}

.invoice-footer-note strong {
    color: rgba(255, 0, 0, 0.6);
}

.invoice-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.invoice-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    border: none;
    text-decoration: none;
    transition: all 0.22s ease;
    white-space: nowrap;
}

.invoice-btn--primary {
    background: red;
    color: #000;
    box-shadow: 0 0 18px rgba(255, 0, 0, 0.35);
}

.invoice-btn--primary:hover {
    background: #fff;
    color: #000;
    box-shadow: 0 0 24px rgba(255, 255, 255, 0.3);
    text-decoration: none;
}

.invoice-btn--outline {
    background: transparent;
    color: red;
    border: 1px solid rgba(255, 0, 0, 0.6);
}

.invoice-btn--outline:hover {
    background: red;
    color: #000;
    text-decoration: none;
}

/* ── Thin red accent line at very top ── */
.invoice-top-accent {
    height: 3px;
    background: linear-gradient(90deg, transparent, red, transparent);
}

/* ── Reveal animation ── */
.inv-reveal {
    opacity: 0;
    transform: translateY(16px);
    animation: invReveal 0.5s ease forwards;
}
.inv-reveal.d1 { animation-delay: 0.05s; }
.inv-reveal.d2 { animation-delay: 0.15s; }
.inv-reveal.d3 { animation-delay: 0.25s; }

@keyframes invReveal {
    to { opacity: 1; transform: translateY(0); }
}

/* ── RESPONSIVE ≤ 640px ── */
@media (max-width: 640px) {

    .invoice-page {
        padding: 16px 10px 50px;
    }

    .invoice-doc__head {
        padding: 24px 20px 20px;
        flex-direction: column;
        align-items: flex-start;
    }

    .invoice-badge {
        text-align: left;
    }

    .invoice-badge__title {
        font-size: 24px;
    }

    .invoice-doc__info {
        padding: 22px 20px;
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .invoice-info-group:last-child {
        padding: 0;
        border-left: none;
        border-top: 1px solid rgba(255, 0, 0, 0.15);
        padding-top: 20px;
    }

    .invoice-doc__items {
        padding: 22px 20px;
    }

    /* Stack items table on mobile */
    .invoice-items-table thead {
        display: none;
    }

    .invoice-items-table tbody,
    .invoice-items-table tbody tr,
    .invoice-items-table tbody td {
        display: block;
        width: 100%;
    }

    .invoice-items-table tbody tr {
        background: rgba(255, 0, 0, 0.03);
        border: 1px solid rgba(255, 0, 0, 0.15);
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 4px 0;
    }

    .invoice-items-table tbody td {
        padding: 8px 14px;
        text-align: left !important;
        border: none;
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }

    .invoice-items-table tbody td:last-child {
        border-bottom: none;
    }

    .invoice-items-table tbody td::before {
        display: block;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255, 0, 0, 0.7);
        margin-bottom: 3px;
    }

    .invoice-items-table tbody td:nth-child(1)::before { content: 'Product'; }
    .invoice-items-table tbody td:nth-child(2)::before { content: 'Unit Price'; }
    .invoice-items-table tbody td:nth-child(3)::before { content: 'Qty'; }
    .invoice-items-table tbody td:nth-child(4)::before { content: 'Subtotal'; }

    .invoice-total-bar {
        padding: 12px 14px;
    }

    .invoice-total-bar__amount {
        font-size: 18px;
    }

    .invoice-doc__footer {
        padding: 18px 20px;
        flex-direction: column;
    }

    .invoice-actions {
        width: 100%;
    }

    .invoice-btn {
        flex: 1;
        justify-content: center;
    }
}

/* ── Print styles ── */
@media print {
    body { background: #fff; color: #000; }
    .invoice-doc { box-shadow: none; border: 1px solid #ccc; border-radius: 0; }
    .invoice-doc__head { background: #fff; }
    .invoice-doc__head::before { display: none; }
    .invoice-brand__name, .invoice-badge__title { color: #c0392b; }
    .invoice-btn, .invoice-actions { display: none; }
    .invoice-items-table thead th,
    .invoice-info-group__title,
    .invoice-section-title { color: #c0392b; }
    .invoice-items-table tbody td { color: #111; }
    .invoice-info-row__value { color: #111; }
    .invoice-total-bar { background: #f9f9f9; border-color: #ccc; }
    .invoice-total-bar__amount { color: #c0392b; }
}
</style>
@endpush

@section('content')

<div class="invoice-page inv-reveal d1">

    <div class="invoice-doc">

        {{-- ── Top red accent line ── --}}
        <div class="invoice-top-accent"></div>

        {{-- ── HEADER ── --}}
        <div class="invoice-doc__head inv-reveal d1">

            <div class="invoice-brand">
                <img src="{{ asset('images/web-logo.png') }}"
                     alt="Rider's Den"
                     class="invoice-brand__logo">
                <div>
                    <p class="invoice-brand__name">Rider's Den</p>
                    <p class="invoice-brand__tagline">Premium Bike Accessories</p>
                </div>
            </div>

            <div class="invoice-badge">
                <p class="invoice-badge__title">Invoice</p>
                <p class="invoice-badge__number">
                    # RD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                </p>
            </div>

        </div>

        {{-- ── ORDER INFO GRID ── --}}
        <div class="invoice-doc__info inv-reveal d2">

            {{-- Left: Customer details --}}
            <div class="invoice-info-group">
                <p class="invoice-info-group__title">
                    <i class="fa fa-user"></i> Customer Details
                </p>

                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Name</span>
                    <span class="invoice-info-row__value">{{ $order->customer_name }}</span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Email</span>
                    <span class="invoice-info-row__value">{{ $order->email }}</span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Phone</span>
                    <span class="invoice-info-row__value">{{ $order->phone }}</span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Address</span>
                    <span class="invoice-info-row__value">{{ $order->address }}</span>
                </div>
            </div>

            {{-- Right: Order details --}}
            <div class="invoice-info-group">
                <p class="invoice-info-group__title">
                    <i class="fa fa-receipt"></i> Order Details
                </p>

                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Invoice No</span>
                    <span class="invoice-info-row__value">
                        RD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Order Date</span>
                    <span class="invoice-info-row__value">
                        {{ $order->created_at->format('d M Y') }}
                    </span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Order Time</span>
                    <span class="invoice-info-row__value">
                        {{ $order->created_at->format('h:i A') }}
                    </span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Payment</span>
                    <span class="invoice-info-row__value">
                        {{ strtoupper($order->payment_type) }}
                    </span>
                </div>
                <div class="invoice-info-row">
                    <span class="invoice-info-row__label">Status</span>
                    <span class="invoice-info-row__value">
                        <span class="invoice-paid-badge">PAID</span>
                    </span>
                </div>
            </div>

        </div>

        {{-- ── ORDER ITEMS ── --}}
        <div class="invoice-doc__items inv-reveal d3">

            <p class="invoice-section-title">
                <i class="fa fa-box"></i> Order Items
            </p>

            <table class="invoice-items-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th style="text-align:right;">Unit Price</th>
                        <th style="text-align:right;">Qty</th>
                        <th style="text-align:right;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>
                            @if($item->product && $item->product->image)
                                <img src="{{ asset('images/'.$item->product->image) }}"
                                     alt="{{ $item->product_name }}"
                                     class="invoice-item-thumb">
                            @endif
                            {{ $item->product_name }}
                        </td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Grand Total Bar --}}
            <div class="invoice-total-bar">
                <span class="invoice-total-bar__label">
                    <i class="fa fa-indian-rupee-sign" style="margin-right:6px;"></i>
                    Grand Total
                </span>
                <span class="invoice-total-bar__amount">
                    ₹{{ number_format($order->total, 2) }}
                </span>
            </div>

        </div>

        {{-- ── FOOTER / ACTIONS ── --}}
        <div class="invoice-doc__footer">

            <div class="invoice-footer-note">
                <strong>Thank you for shopping with Rider's Den!</strong><br>
                This is a computer-generated invoice and does not require a signature.
            </div>

            <div class="invoice-actions">
                <button onclick="window.print()" class="invoice-btn invoice-btn--outline">
                    <i class="fa fa-print"></i> Print
                </button>
                <a href="/invoice/{{ $order->id }}/download" class="invoice-btn invoice-btn--primary">
                    <i class="fa fa-download"></i> Download PDF
                </a>
                <a href="/" class="invoice-btn invoice-btn--outline">
                    <i class="fa fa-home"></i> Back to Home
                </a>
            </div>

        </div>

    </div>{{-- .invoice-doc --}}

</div>{{-- .invoice-page --}}

@endsection
