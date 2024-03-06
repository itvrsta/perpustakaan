<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisher.index', [
            'publisher' => Publisher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>['required', 'min:3'],
            'address' =>['required', 'min:3'],
        ]);

        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect()->route('publisher.index');
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
    public function edit($id)
    {
        $publisher = Publisher::find($id);

        return view('publisher.edit', [
        'publisher' =>$publisher,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>['required', 'min:3'],
            'address' => ['required', 'min:3'],
        ]);

        $publisher = publisher::find($id);

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();
        session()->flash('info', 'Data berhasil diperbarui.');

        return redirect()->route('publisher.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
        session()->flash('danger', 'Data berhasil dihapus.');
        return redirect()->route('publisher.index');
    }
}
