<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::all();
        return view('libraries.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libraries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:libraries',
            'registration_number' => 'required|unique:libraries'
        ]);

        Library::create($request->all());

        return redirect()->route('libraries.index')
                         ->with('success', 'Biblioteca criada com sucesso!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
