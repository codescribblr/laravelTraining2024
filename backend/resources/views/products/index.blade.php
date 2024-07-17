<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
<h1>Products</h1>
<a href="{{ route('products.create') }}">Create New Product</a>
<ul>
    @foreach ($products as $product)
    <li>
        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
</body>
</html>
