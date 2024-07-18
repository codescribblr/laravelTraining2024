<!-- resources/views/categories/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
<h1>Edit Category</h1>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description">{{ $category->description }}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>
