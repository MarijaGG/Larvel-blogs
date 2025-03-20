<x-layout>

<x-slot:title>Izveidot blog ierakstu</x-slot:title>
<h1>Izveidot blog ierakstu</h1>

<form method="POST" action="/blogs">
@csrf
  <input name="content" />

  @error("content")
  <p>{{ $message }}</p>
  @enderror

  <button>Saglabāt</button>
</form>

</x-layout>