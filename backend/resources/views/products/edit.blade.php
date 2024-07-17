<!-- resources/views/products/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}">
    <br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="{{ $product->price }}">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description">{{ $product->description }}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>
