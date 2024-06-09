<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::withCount('comments')->get();
        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categoryId = $request->input('category_id');
        return view('posts.partials.create', compact('categoryId'));
        //return view('posts.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'title' => 'required|string',
            'poster' => 'required|image',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $request->merge(['user_id' => $userId]);

        $post = Post::create($request->all());

        if ($request->hasFile('poster')) {
            $imageUpload = $request->file('poster')->store('categories');
            $imageUpload = explode('/', $imageUpload)[1];
            $post->poster = $imageUpload;
            $post->save();
        }
        return redirect()->route('categories.show', $request->category_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->findOrFail($id);
        $comments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.partials.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'poster' => 'nullable|image', // La imagen ya no es requerida
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        if ($request->hasFile('poster')) {
            // Eliminar la imagen anterior si existe
            if ($post->poster) {
                Storage::delete('categories/' . $post->poster);
            }

            $imageUpload = $request->file('poster')->store('categories');
            $imageUpload = explode('/', $imageUpload)[1];
            $post->poster = $imageUpload;
            $post->save();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['success' => true, 'message' => 'El post se elimino correctamente']);
    }

    public function toggleHabilitated(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->habilitated = $request->input('habilitated');
        $post->save();

        if ($post->habilitated) {
            return response()->json(['success' => true, 'message' => 'El post se habilitó correctamente']);
        } else {
            return response()->json(['success' => true, 'message' => 'El post se deshabilitó correctamente']);
        }
    }
}
