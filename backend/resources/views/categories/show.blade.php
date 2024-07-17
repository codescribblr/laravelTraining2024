<!-- resources/views/categories/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Category Details</title>
</head>
<body>
<h1>{{ $category->name }}</h1>
<p>Description: {{ $category->description }}</p>
<a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>
