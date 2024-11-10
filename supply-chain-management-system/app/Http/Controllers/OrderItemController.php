<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderItems.index', compact('orderItems'));
    }

    public function create()
    {
        return view('orderItems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:purchase_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        OrderItem::create($request->all());

        return redirect()->route('orderItems.index')
                         ->with('success', 'Order Item created successfully.');
    }

    public function show(OrderItem $orderItem)
    {
        return view('orderItems.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        return view('orderItems.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:purchase_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        $orderItem->update($request->all());

        return redirect()->route('orderItems.index')
                         ->with('success', 'Order Item updated successfully.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('orderItems.index')
                         ->with('success', 'Order Item deleted successfully.');
    }
}
