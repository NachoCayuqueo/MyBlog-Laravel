<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::all();
        return view('posts/index', compact('posts'));
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


    public function myPosts()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('dashboard', compact('posts'));
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
