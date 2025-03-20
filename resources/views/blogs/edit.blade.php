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
        <input name="content" type="text"  value="<?php echo htmlspecialchars($blog->content); ?>">
        @error("content")
            <p>{{ $message }}</p>
        @enderror
    </label>

  <br> <br>  <button type="submit">Saglabāt</button>
  </form>

</x-layout>