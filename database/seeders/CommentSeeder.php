<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emanuel = User::where('email', 'emanuel@gmail.com')->first();
        $lucas = User::where('email', 'lucas@gmail.com')->first();
        $pablo = User::where('email', 'pablo@gmail.com')->first();


        // Obtenemos todos los posts
        $posts = Post::all();

        // Creamos comentarios para cada post
        foreach ($posts as $post) {
            if ($post->title === 'Slam Dunk') {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $emanuel->id,
                    'content' => 'El mejor anime que vi de deportes. Me encanta!',
                ]);
            }
            if ($post->title === 'Futbol') {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $pablo->id,
                    'content' => 'Hincha Fanatico de River Plate!',
                ]);
            }
            if ($post->title === 'Reggae') {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $lucas->id,
                    'content' => 'Me encanta Nonpalidece, Los pericos y dread mar i',
                ]);
            }
        }
    }
}
