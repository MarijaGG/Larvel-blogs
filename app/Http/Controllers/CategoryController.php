<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        return view('categories.index', compact('categories')); 
    }

    public function show($category_id) {
        $category = Category::findOrFail($category_id);
        return view("categories.show", compact("category"));
    }
    
    public function create(category $create) {
        return view("categories.create", compact("create"));
    }

    public function edit(category $category) {
        return view("categories.edit", compact("category"));
    }

    public function destroy(category $category) {
        $category->delete();
        return redirect("categories");
    }

    public function update(Request $request, category $category) {
        $validated = $request->validate([
          "category_name" => ["required"],
         ]);

        $category->category_name = $validated["category_name"];
        $category->save();

        return redirect("/categories/" . $category->id);;

    }

    public function store(Request $request) {

        $validated = $request->validate([
            "category_name" => ["required", "max:255"]
           ]);

        category::create([
            "category_name" => $request->category_name,
          ]);

          return redirect("/categories");
    }
    
}
