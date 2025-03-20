<x-layout>

<h1>Blogs</h1>

<form>
    <input name='search' value='<?= $_GET["search"] ?? "" ?>'/>
    <button>Search</button>
</form>

<ul>
  @foreach ($blogs as $blog)
    <li class="content"><a href="/blogs/{{ $blog->id }}">{{ $blog->content }}</a></li>
  @endforeach
</ul>

</x-layout>