<?php

namespace App\Http\Controllers;
use App\Models\Blog;
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
        $blog = Blog::findOrFail($blog_id);
        return view("blogs.show", compact("blog"));
    }
    
    public function create(Blog $create) {
        return view("blogs.create", compact("create"));
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

        $validated = $request->validate([
            "content" => ["required", "max:255"]
           ]);

        Blog::create([
            "content" => $request->content,
          ]);

          return redirect("/");
    }
    
}
