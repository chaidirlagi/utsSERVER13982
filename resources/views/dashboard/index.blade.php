<!-- resources/views/dashboard/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Dashboard</h1>

    <!-- Stock Summary -->
    <h2>Stock Summary</h2>
    <p>Total Stock: {{ $stockSummary->total_stock }}</p>
    <p>Total Value: {{ $stockSummary->total_value }}</p>
    <p>Average Price: {{ $stockSummary->avg_price }}</p>

    <!-- Low Stock Items -->
    <h2>Low Stock Items (Below 5 Units)</h2>
    <ul>
        @foreach ($lowStockItems as $item)
            <li>{{ $item->name }} ({{ $item->quantity }} units) - Category: {{ $item->category->name }}</li>
        @endforeach
    </ul>

    <!-- Items by Category -->
    <h2>Items in Category</h2>
    <ul>
        @foreach ($categoryItems as $item)
            <li>{{ $item->name }} - {{ $item->quantity }} units</li>
        @endforeach
    </ul>

    <!-- Category Summary -->
    <h2>Category Summary</h2>
    <ul>
        @foreach ($categorySummary as $category)
            <li>{{ $category->name }}: {{ $category->item_count }} items, Total Value: {{ $category->total_value }}, Avg Price: {{ $category->avg_price }}</li>
        @endforeach
    </ul>

    <!-- Supplier Summary -->
    <h2>Supplier Summary</h2>
    <ul>
        @foreach ($supplierSummary as $supplier)
            <li>{{ $supplier->name }}: {{ $supplier->item_count }} items, Total Value: {{ $supplier->total_value }}</li>
        @endforeach
    </ul>

    <!-- System Summary -->
    <h2>System Summary</h2>
    <p>Total Items: {{ $systemSummary['total_items'] }}</p>
    <p>Total Stock Value: {{ $systemSummary['total_stock_value'] }}</p>
    <p>Total Categories: {{ $systemSummary['total_categories'] }}</p>
    <p>Total Suppliers: {{ $systemSummary['total_suppliers'] }}</p>
</body>
</html>