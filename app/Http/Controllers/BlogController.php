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
    
}
