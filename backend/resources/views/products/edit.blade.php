<!-- resources/views/products/edit.blade.php -->
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
    <label for="category_id">Category:</label>
    <select id="category_id" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="tags">Tags:</label>
    @foreach ($tags as $tag)
    <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
    <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
    @endforeach
    <br>
    <button type="submit">Update</button>
</form>
