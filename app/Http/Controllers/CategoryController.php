<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException; // Import ValidationException

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            Category::create([
                'title' => $request->input('title'),
            ]);

            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (ValidationException $e) {
            return redirect()->route('categories.create')->withErrors($e->errors())->withInput();
        }
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $category->update([
                'title' => $request->input('title'),
            ]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (ValidationException $e) {
            return redirect()->route('categories.edit', $category->id)->withErrors($e->errors())->withInput();
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
