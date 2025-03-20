<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<x-navigation></x-navigation>
    
<h1>Blogs</h1>

<form>
    <input name='search' value='<?= $_GET["search"] ?? "" ?>'/>
    <button>Search</button>
</form>

<ul>
  @foreach ($blogs as $blog)
    <li class="content">{{ $blog->content }}</li>
  @endforeach
</ul>

</body>
</html>