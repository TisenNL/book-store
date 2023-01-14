<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(Book::$rules);
        $book = Book::create($validatedData);
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return $book;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(Book::$rules);
        $book = Book::findOrFail($id);
        $book->update($validatedData);
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
