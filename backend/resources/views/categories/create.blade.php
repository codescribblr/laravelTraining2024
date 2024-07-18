<!-- resources/views/categories/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>
<h1>Create Category</h1>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>
