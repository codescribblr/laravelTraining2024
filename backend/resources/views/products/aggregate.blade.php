<!-- resources/views/products/aggregate.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product Data</title>
</head>
<body>
<h1>Product Data</h1>
<ul>
    <li>Total Products: {{ $data['count'] }}</li>
    <li>Max Price: ${{ $data['max'] }}</li>
    <li>Min Price: ${{ $data['min'] }}</li>
    <li>Average Price: ${{ $data['avg'] }}</li>
    <li>Total Sum of Prices: ${{ $data['sum'] }}</li>
</ul>
</body>
</html>
