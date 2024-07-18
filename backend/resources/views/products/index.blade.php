<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
<h1>Products</h1>
@can('create', App\Models\Product::class)
<a href="{{ route('products.create') }}">Create New Product</a>
@endcan
<ul>
    @foreach ($products as $product)
    <li>
        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }} - {{ $product->category_name }} - ${{ $product->price }}</a>
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
