<x-layout>

<x-slot:title>
    {{ $category->category_name }}
</x-slot:title>

  <h1>{{ $category->category_name }}</h1>

  

  <a href="/categories/edit/{{ $category->id }}">Rediģēt<a>

  <form action="/categories/{{ $category->id }}" method="POST">
    @method('delete')
    @csrf
    <button type="submit">Izdzēst</button>
  </form>

</x-layout>