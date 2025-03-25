<x-layout>

<x-slot:title>Izveidot blog ierakstu</x-slot:title>
<h1>Izveidot blog ierakstu</h1>

<form method="POST" action="/blogs">
    @csrf
    <div>
        <label for="content">Content:</label>
        <input type="text" name="content" id="content" />
        @error("content")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <option value="">No Category</option> <!-- Option for no category -->
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error("category_id")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Saglabāt</button>
</form>

</x-layout>
