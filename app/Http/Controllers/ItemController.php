<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'supplier', 'admin'])->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer|min:0', 
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'created_by' => 'required|exists:admins,id',
        ]);

        $item = Item::create($validated);
        return response()->json($item, 201);
    }

    public function quantitySummary()
    {
        $totalItems = Item::sum('quantity'); // Jumlah total unit barang (stok)
        $totalValue = Item::selectRaw('SUM(price * quantity) as total_value')->value('total_value'); // Total nilai stok (harga × stok)
        $averagePrice = Item::avg('price'); // Rata-rata harga

        return response()->json([
            'total_items' => (int) $totalItems,
            'total_value' => (int) $totalValue,
            'average_price' => (int) $averagePrice,
        ]);
    }

    public function lowquantity()
    {
        $lowquantityThreshold = 5; // Ambang batas stok rendah
        $lowquantityItems = Item::with(['category', 'supplier', 'admin'])
                            ->where('quantity', '<=', $lowquantityThreshold)
                            ->get();

        if ($lowquantityItems->isEmpty()) {
            return response()->json([
                'message' => 'No items with low quantity found.'
            ], 200);
        }

        return response()->json($lowquantityItems);
    }
}