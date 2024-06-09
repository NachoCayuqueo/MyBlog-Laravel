<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
        return view('categories.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'name' => 'required|string',
            'poster' => 'required|image',
            'content' => 'required|string',
        ]);
        $request->merge(['user_id' => $userId]);

        $category = Category::create($request->all());

        if ($request->hasFile('poster')) {
            $imageUpload = $request->file('poster')->store('categories');
            $imageUpload = explode('/', $imageUpload)[1];
            $category->poster = $imageUpload;
            $category->save();
        }
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()->withCount('comments')->get();
        // $posts = $category->posts()->get();
        // $posts = Post::withCount('comments')->get();

        return view('categories.show', compact('category', 'posts'));
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
}
