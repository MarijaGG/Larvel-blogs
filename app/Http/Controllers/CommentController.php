<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Request $request, $blog_id)
    {
        // Validate input
        $validated = $request->validate([
            'author' => 'required|string|max:100',
            'content' => 'required|string|max:500',
        ]);

        // Create comment
        Comment::create([
            'blog_id' => $blog_id,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function edit($comment_id)
    {
        // Get the comment and pass it to the view
        $comment = Comment::findOrFail($comment_id);

        return redirect()->route('blogs.show', $comment->blog_id)
            ->withInput(['comment_id' => $comment_id]);
    }

    public function destroy(Comment $comment)
    {
        // Delete the comment
        $comment->delete();

        // Redirect back to the blog post page
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
