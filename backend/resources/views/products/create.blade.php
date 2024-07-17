<!-- resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>
