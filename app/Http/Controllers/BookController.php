<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    public function index()
    { 

        $books = Book::paginate(3);
        return view('books.index', compact('books'));
    }

    public function create() 
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',   
                     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust the mime types and size limi
                'category_id' => 'required|exists:categories,id',
            ]);

            // Check if an image is uploaded
            if ($request->hasFile('image')) {
                // If an image is uploaded, store it and get the file path
                $imagePath = $request->file('image')->store('public/images/books');
                $imageFileName = basename($imagePath);
            } else {
                // If no image is uploaded, use a default image
                $imageFileName = '1.png'; // Change this to your default image filename
            }

            // Save the book details in the database
            Book::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'image' => $imageFileName,
                'category_id' => $request->input('category_id'),
            ]);

            return redirect()->route('books.index')->with('success', 'Book created successfully');
        } catch (ValidationException $e ) {
            // return redirect()->route('books.create')->with('error', 'Error creating book: ' . $e->getMessage())->withInput();
            return redirect()->route('books.create')->withErrors($e->errors())->withInput();
            return redirect()->route('books.create')->withErrors($e->errors())->withInput();


        }
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
            ]);

            $book->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
            ]);

            return redirect()->route('books.index')->with('success', 'Book updated successfully');
        } catch (ValidationException $e) {
            return redirect()->route('books.edit', $book->id)->withErrors($e->errors())->withInput();
        }
    }

    public function destroy(Book $book)
    {
        try {
            // Get the image path
            $imagePath = 'public/images/books/' . $book->image;
    
            // Check if the file exists and it is not the default image before attempting to delete it
            if (Storage::exists($imagePath) && $book->image !== '1.png') {
                // Delete the image file from the storage
                Storage::delete($imagePath);
            }
    
            // Delete the book record from the database
            $book->delete();
    
            return redirect()->route('books.index')->with('success', 'Book deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('books.index')->with('error', 'Error deleting book: ' . $e->getMessage());
        }
    }
    
    }

