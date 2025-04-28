<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Stock Summary
        $stockSummary = Item::selectRaw('SUM(quantity) as total_stock, SUM(price * quantity) as total_value, AVG(price) as avg_price')
            ->first();

        // Low Stock Items (below 5 units)
        $lowStockItems = Item::where('quantity', '<', 5)->with('category', 'supplier')->get();

        // Items by Category (example: first category)
        $categoryItems = Item::where('category_id', Category::first()->id ?? 0)->with('category')->get();

        // Summary per Category
        $categorySummary = Category::select('categories.name')
            ->selectRaw('COUNT(items.id) as item_count, SUM(items.price * items.quantity) as total_value, AVG(items.price) as avg_price')
            ->leftJoin('items', 'categories.id', '=', 'items.category_id')
            ->groupBy('categories.id', 'categories.name')
            ->get();

        // Summary per Supplier
        $supplierSummary = Supplier::select('suppliers.name')
            ->selectRaw('COUNT(items.id) as item_count, SUM(items.price * items.quantity) as total_value')
            ->leftJoin('items', 'suppliers.id', '=', 'items.supplier_id')
            ->groupBy('suppliers.id', 'suppliers.name')
            ->get();

        // Overall System Summary
        $systemSummary = [
            'total_items' => Item::count(),
            'total_stock_value' => Item::sum(DB::raw('price * quantity')),
            'total_categories' => Category::count(),
            'total_suppliers' => Supplier::count(),
        ];

        return view('dashboard.index', compact(
            'stockSummary',
            'lowStockItems',
            'categoryItems',
            'categorySummary',
            'supplierSummary',
            'systemSummary'
        ));
    }
}