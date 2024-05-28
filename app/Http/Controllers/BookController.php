<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->guest() || auth()->user()->role_id !== 1) {
            return view('books', [
                "books" => Book::with('categories')->latest()->filter(request(['search', 'category']))->get(),
                "categories" => Category::all(),
            ]);
        }

        return view('dashboard.books.index', [
            'books' => Book::with('categories')->latest()->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|max:255'
        ]);
        $validatedData['status'] = 'in stock';

        Book::create($validatedData);

        $book = Book::latest()->get();

        $bookCategory['book_id'] = $book[0]->id;
        $bookCategory['category_id'] = $request['category_id'];

        BookCategory::create($bookCategory);

        return redirect('/dashboard/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if (auth()->guest() || auth()->user()->role_id !== 1) {
            return view('book', [
                "book" => $book
            ]);
        }

        return view('dashboard.books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (auth()->guest() || auth()->user()->role_id !== 1) {
            return view('home');
        }

        return view('dashboard.books.edit', [
            'categories' => Category::all(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rule = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|max:255'
        ];

        if ($request->book_code != $book->book_code) {
            $rule['book_code'] = 'required|unique:books|max:255';
        }

        $validatedData = $request->validate($rule);

        Book::where('id', $book->id)
            ->update($validatedData);


        $bookCategory['category_id'] = $request['category_id'];
        $bookCategory['book_id'] = $book->id;

        BookCategory::where('book_id', $book->id)
            ->update($bookCategory);

        return redirect('/dashboard/books/' . $book->id)->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/dashboard/books');
    }
}
