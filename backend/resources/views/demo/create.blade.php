<!-- resources/views/demo/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Demo</title>
</head>
<body>
<h1>Create Demo</h1>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('demo.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation">
    <br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
