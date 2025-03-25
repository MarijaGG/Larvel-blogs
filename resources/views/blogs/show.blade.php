<x-layout>

<x-slot:title>
    {{ $blog->content }}
</x-slot:title>

  <h1>{{ $blog->content }}</h1>
  <h2>{{ $blog->category->category_name ?? 'No Category' }}</h2>

  <a href="edit/{{ $blog->id }}">Rediģēt</a>

  <form action="/blogs/{{ $blog->id }}" method="POST">
    @method('delete')
    @csrf
    <button type="submit">Izdzēst</button>
  </form>

</x-layout>