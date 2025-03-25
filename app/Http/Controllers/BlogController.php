<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(Request $request) {
        $blogs = Blog::all();

        $search = $request->input('search');

        // Simple query with optional search
        $blogs = Blog::where('content', 'like', "%{$search}%")->get();

        return view('blogs.index', compact('blogs')); 
    }

    public function show($blog_id) {
        $blog = Blog::with('category')->findOrFail($blog_id);
        return view("blogs.show", compact("blog"));
    }      
    
    public function create() {
        $categories = Category::all(); // Get all categories
        return view("blogs.create", compact('categories')); // Pass categories to the view
    }
    

    public function edit(Blog $blog) {
        return view("blogs.edit", compact("blog"));
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect("/");
    }

    public function update(Request $request, Blog $blog) {
        $validated = $request->validate([
          "content" => ["required"],
         ]);

        $blog->content = $validated["content"];
        $blog->save();

        return redirect("/blogs/" . $blog->id);;

    }

    public function store(Request $request) {
        // Validate the request
        $validated = $request->validate([
            "content" => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id', // Allow NULL and validate category ID if present
        ]);
    
        // Store the blog post, setting category_id to NULL if it's not provided
        Blog::create([
            "content" => $request->content,
            "category_id" => $request->category_id ?: null, // If no category is selected, store NULL
        ]);

          return redirect("/");
    }
    
}
