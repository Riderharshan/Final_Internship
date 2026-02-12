<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('invoice', compact('order'));
    }

    public function download($id)
    {
        $order = Order::with('items')->findOrFail($id);

        $pdf = Pdf::loadView('invoice-pdf', compact('order'));

        return $pdf->download('invoice_'.$order->id.'.pdf');
    }
}
