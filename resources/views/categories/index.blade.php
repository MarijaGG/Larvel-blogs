<x-layout>

<h1>Kategorijas</h1>

<ul>
  @foreach ($categories as $category)
    <li class="content"><a href="/categories/{{ $category->id }}">{{ $category->category_name }}</a></li>
  @endforeach
</ul>

</x-layout>