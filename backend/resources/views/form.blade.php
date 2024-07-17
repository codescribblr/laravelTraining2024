<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<x-alert type="success">
    <strong>Success!</strong> Your action was successful.
</x-alert>
@if (session('name'))
<p>Hello, {{ session('name') }}</p>
@endif
<form action="{{ route('form.submit') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Submit</button>
</form>
</body>
</html>
