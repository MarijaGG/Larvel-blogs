<x-layout>

<x-slot:title>Izveidot kategoriju</x-slot:title>
<h1>Izveidot kategoriju</h1>

<form method="POST" action="/categories">
@csrf
  <input name="category_name" />

  @error("category_name")
  <p>{{ $message }}</p>
  @enderror

  <button>Saglabāt</button>
</form>

</x-layout>