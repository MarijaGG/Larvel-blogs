<x-layout>
  <x-slot:title>
    Rediģēt ierakstu
  </x-slot:title>

  <h1>
    Rediģēt bloga ierakstu
  </h1>

  <form method="POST" action="/blogs/{{ $blog->id }}">
    @csrf
    @method('PUT')

    <label>
        <input name="content" type="text" value="{{ old('content', $blog->content) }}">
        @error("content")
            <p>{{ $message }}</p>
        @enderror
    </label>

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <option value="">No Category</option> <!-- Option for no category -->
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" 
                {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>
    @error("category_id")
        <p>{{ $message }}</p>
    @enderror

    <br><br>
    <button type="submit">Saglabāt</button>
  </form>
</x-layout>
