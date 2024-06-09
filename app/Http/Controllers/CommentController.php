<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments/index', compact('comments'));
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
        $userId = Auth::id();
        $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $request->merge(['user_id' => $userId]);

        $comment = Comment::create($request->all());
        // debe redireccionar al apartado donde escribio el comentario
        // return redirect()->route('categories.index');
        return redirect()->route('posts.show', ['post' => $comment->post_id]);
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
        $comment = Comment::findOrFail($id);
        return view('comments.partials.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(['success' => true, 'message' => 'El comentario se elimino correctamente']);
    }

    public function myComments()
    {
        $user = Auth::user();
        $comments = Comment::where('user_id', $user->id)->get();
        $comments->load('post');
        return view('dashboard', compact('comments'));
    }
}
