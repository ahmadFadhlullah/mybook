<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('book.index', ['books' => $books]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $book = new Books;
        $book->name = $request->name;
        $book->category = $request->category;
        $book->author = $request->author;
        $book->save();

        return redirect()->route('book.index');
    }

    public function show(Books $book)
    {
        return view('book.show', ['book' => $book]);
    }

    public function edit(Books $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    public function update(Request $request, Books $book)
    {
        $book->name = $request->name;
        $book->category = $request->category;
        $book->author = $request->author;
        $book->save();

        return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index');
    }
}
