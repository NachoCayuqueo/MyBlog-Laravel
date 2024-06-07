<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $category = Category::findOrFail($id);
        return view('categories.partials.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'poster' => 'nullable|image', // La imagen ya no es requerida
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        if ($request->hasFile('poster')) {
            // Eliminar la imagen anterior si existe
            if ($category->poster) {
                Storage::delete('categories/' . $category->poster);
            }

            $imageUpload = $request->file('poster')->store('categories');
            $imageUpload = explode('/', $imageUpload)[1];
            $category->poster = $imageUpload;
            $category->save();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true, 'message' => 'La categoria se elimino correctamente']);
    }

    public function myCategories()
    {
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();

        return view('dashboard', compact('categories'));
    }
}
