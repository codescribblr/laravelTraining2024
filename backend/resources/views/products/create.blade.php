<!-- resources/views/products/create.blade.php -->
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <h1>Create Product</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <label for="category_id">Category:</label>
    <select id="category_id" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="tags">Tags:</label>
    @foreach ($tags as $tag)
    <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
    <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
    @endforeach
    <br>
    <button type="submit">Create</button>
</form>
