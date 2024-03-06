<?php

namespace App\Http\Controllers;

use App\Models\author_id;
use App\Models\Books;
use App\Models\BooksAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => Books::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'authors' => BooksAuthor::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>['required'],
            'year' =>['required'],
            'cover' => ['image'],
        ]);

        $cover = null;
        if ($request->hasfile('cover')){
        $cover = $request->file('cover')->store('cover');
    }

        $books = new books();

        $books->books_author_id = $request->books_author_id;
        $books->title = $request->title;
        $books->year = $request->year;
        $books->cover = $cover;
        

        $books->save();
        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Books::find($id);

        return view('books.edit', [
        'books' =>$books,
        'authors' => BooksAuthor::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'books_author_id' =>['required'],
            'title' =>['required'],
            'year' =>['required'],
            'cover' => ['image'],
        ]);

        $books = Books::find($id);
        
        $cover = $books->cover;

        if ($request->hasfile('cover')){
            if($cover != null) {
                if(Storage::exists($cover)){
                    Storage::delete($cover);
                }
            }
        $cover = $request->file('cover')->store('cover');
    }
    
        $books->books_author_id = $request->books_author_id;
        $books->title = $request->title;
        $books->year = $request->year;
        $books->cover = $cover;

        $books->save();
        session()->flash('info', 'Data berhasil diperbarui.');

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        $books->delete();
        session()->flash('danger', 'Data berhasil dihapus.');
        return redirect()->route('books.index');
    }
}
