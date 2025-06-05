<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class OrderDetailsController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:order index']);
    }

    function orderIndex(): View
    {
        $data = Order::query();
        $data->with(['company', 'plan']);
        $this->search($data, ['package_name', 'transaction_id', 'order_id', 'payment_provider']);
        $orders = $data->orderBy('id', 'DESC')->paginate(20);

        return view('admin.order.index', compact('orders'));
    }

    function showOrder($id): View
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show-deitals', compact('order'));
    }

    function invoice($id)
    {
        $order = Order::findOrFail($id);
        $customer = new Buyer([
            'name'          => $order?->company->name,
            'custom_fields' => [
                'email' => $order?->company->email,
                'transaction' => $order?->transaction_id,
                'payment method' => $order?->payment_provider,
            ],
        ]);

        $seller = new Party([
            'name'          => config('generalSetting.site_name'),
            'phone'         => config('generalSetting.site_phone'),
            'custom_fields' => [
                'email' => config('generalSetting.site_email')
            ],
        ]);

        $item = InvoiceItem::make($order?->package_name . ' Plan')->pricePerUnit($order?->amount);

        $invoice = Invoice::make()
            ->series($order?->order_id)
            ->currencyCode($order?->paid_in_currency)
            ->currencySymbol($order?->paid_in_currency)
            ->buyer($customer)
            ->seller($seller)
            ->status('paid')
            ->addItem($item);

        return $invoice->download();
    }
}
