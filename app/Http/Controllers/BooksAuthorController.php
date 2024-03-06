<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\BooksAuthor;
use Illuminate\Http\Request;

class BooksAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors_id.index', [
        'authors' => BooksAuthor::get(),
    ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors_id.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new BooksAuthor();

        $author->name = $request->name;
        $author->slug = $request->slug;

        $author->save();

        session()->flash('success', 'author_id di tambahkan');

        return redirect()->route('authors_id.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('authors_id.show', [
            'author' => BooksAuthor::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = BooksAuthor::find($id);
        return view('authors_id.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = BooksAuthor::find($id);

        $author->name = $request->name;
        $author->slug = $request->slug;

        $author->save();
        session()->flash('info', 'author_id di perbarui');

        return redirect()->route('authors_id.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = BooksAuthor::find($id);
        $author->delete();

        session()->flash('danger', 'author_id di hapus');

        return redirect()->route('authors_id.index');
    }
}
