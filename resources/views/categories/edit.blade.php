<x-layout>
<x-slot:title>
    Rediģēt ierakstu
  </x-slot:title>

  <h1>
    Rediģēt kategoriju
  </h1>

  <form method="POST" action="/categories/{{ $category->id }}">
    @csrf
    @method('PUT')
    <label>
        <input name="category_name" type="text"  value="<?php echo htmlspecialchars($category->category_name); ?>">
        @error("category_name")
            <p>{{ $message }}</p>
        @enderror
    </label>

  <br> <br>  <button type="submit">Saglabāt</button>
  </form>

</x-layout>