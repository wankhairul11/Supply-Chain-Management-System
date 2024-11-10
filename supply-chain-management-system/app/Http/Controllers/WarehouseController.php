<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|integer|exists:locations,id',
            'capacity' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('warehouses.index')
                         ->with('success', 'Warehouse created successfully.');
    }

    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact('warehouse'));
    }

    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|integer|exists:locations,id',
            'capacity' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')
                         ->with('success', 'Warehouse updated successfully.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->route('warehouses.index')
                         ->with('success', 'Warehouse deleted successf
