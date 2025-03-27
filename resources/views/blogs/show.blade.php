<x-layout>

<x-slot:title>
    {{ $blog->content }}
</x-slot:title>

<div class="container">
    {{-- Main Blog Content --}}
    <div class="blog-content">
        <h1>{{ $blog->content }}</h1>
        <h2>{{ $blog->category->category_name ?? 'No Category' }}</h2>

        <a href="edit/{{ $blog->id }}" class="edit-btn">Rediģēt</a>

        <form action="/blogs/{{ $blog->id }}" method="POST" class="delete-form">
            @method('delete')
            @csrf
            <button type="submit" class="delete-btn">Izdzēst</button>
        </form>
    </div>

    {{-- Sidebar for Comments --}}
    <div class="comments-section">
        {{-- Add New Comment Form --}}
        <h3>Pievienot komentāru:</h3>
        <form method="POST" action="/blogs/{{ $blog->id }}/comments" class="comment-form">
            @csrf
            <label for="author">Vārds:</label>
            <input type="text" name="author" required>
            @error('author')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="content">Komentārs:</label>
            <textarea name="content" required></textarea>
            @error('content')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit" class="comment-btn">Pievienot</button>
        </form> 

        <h3>Komentāri:</h3>
        
        @if($blog->comments->isEmpty())
            <p class="no-comments">Nav komentāru.</p>
        @else
            @foreach ($blog->comments as $comment)
                <div class="comment-box" id="comment-{{ $comment->id }}">
                    <strong>{{ $comment->author }}</strong>  
                    <small>({{ $comment->created_at->format('Y-m-d H:i') }})</small>

                    {{-- Show comment content or editable form --}}
                    @if ($comment->id == old('comment_id', -1))
                        {{-- Editable form when editing is in progress --}}
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            @csrf
                            @method('PUT')
                            <textarea name="content" required>{{ old('content', $comment->content) }}</textarea>
                            @error('content')
                                <p class="error">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="save-btn">Saglabāt</button>
                            <a href="{{ route('comments.show', $comment->id) }}" class="cancel-btn">Atcelt</a>
                        </form>
                    @else
                    
                        <p id="content-{{ $comment->id }}">{{ $comment->content }}</p>
                        <div class="comment-actions">
                            {{-- Delete button --}}
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="delete-comment-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-comment-btn">Izdzēst</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>

</x-layout>
