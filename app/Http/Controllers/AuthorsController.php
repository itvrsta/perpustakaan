<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Authors::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>['required', 'min:3'],
            'photo' => ['image'],
        ]);

        $photo = null;

        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('photos');
        }

        $authors = new Authors();

        $authors->name = $request->name;
        $authors->photo = $photo;

        $authors->save();

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect()->route('authors.index');
    }

    public function edit($id)
    {
        $author = Authors::find($id);

        return view('authors.edit', [
        'author' =>$author,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>['required', 'min:3'],
            'photo' => ['image'],
        ]);

        $authors = Authors::find($id);

        $photo = null;

        if($request->hasFile('photo')){
            if(Storage::exists($authors->photo)){
                Storage::delete($authors->photo);
            }
            $photo = $request->file('photo')->store('photo');
        }

        $authors->name = $request->name;
        $authors->photo = $photo;

        $authors->save();
        session()->flash('info', 'Data berhasil diperbarui.');

        return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
        $authors = Authors::find($id);
        $authors->delete();
        session()->flash('danger', 'Data berhasil dihapus.');
        return redirect()->route('authors.index');
    }
}
