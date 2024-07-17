<!-- resources/views/products/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>Price: {{ $product->price }}</p>
<p>Description: {{ $product->description }}</p>
<p>Category: {{ $product->category->name }}</p>
<p>Tags:
    @foreach ($product->tags as $tag)
    {{ $tag->name }}
    @endforeach
</p>
<a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>
