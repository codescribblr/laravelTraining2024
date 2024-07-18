<!-- resources/views/products/expensive.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Expensive Products</title>
</head>
<body>
<h1>Expensive Products</h1>
<ul>
    @foreach ($products as $product)
    <li>{{ $product->name }} - ${{ $product->price }}</li>
    @endforeach
</ul>
</body>
</html>
