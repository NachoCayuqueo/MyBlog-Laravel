<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emanuel = User::where('email', 'emanuel@gmail.com')->first();
        $lucas = User::where('email', 'lucas@gmail.com')->first();
        $pablo = User::where('email', 'pablo@gmail.com')->first();

        $categories = Category::all();


        foreach ($categories as $category) {
            if ($category->name === 'Anime') {
                Post::create([
                    'user_id' => $emanuel->id,
                    'category_id' => $category->id,
                    'title' => 'Dragon Ball Super',
                    'content' => 'Do cillum ea aliquip labore labore veniam anim veniam in anim cupidatat cupidatat aute.',
                    'poster' => 'dragon_ball_super.jpg',
                    'habilitated' => true
                ]);
                Post::create([
                    'user_id' => $lucas->id,
                    'category_id' => $category->id,
                    'title' => 'Slam Dunk',
                    'content' => 'Dolor adipisicing pariatur ipsum eiusmod eu nisi aute.',
                    'poster' => 'slam_dunk.jpg',
                    'habilitated' => true
                ]);
            }
            if ($category->name === 'Deportes') {
                Post::create([
                    'user_id' => $pablo->id,
                    'category_id' => $category->id,
                    'title' => 'Futbol',
                    'content' => 'Incididunt est reprehenderit laborum officia et.',
                    'poster' => 'futbol.jpg',
                    'habilitated' => true
                ]);
                Post::create([
                    'user_id' => $emanuel->id,
                    'category_id' => $category->id,
                    'title' => 'Básquet',
                    'content' => 'Dolor adipisicing pariatur ipsum eiusmod eu nisi aute.',
                    'poster' => 'basquet.jpg',
                    'habilitated' => true
                ]);
            }
            if ($category->name === 'Música') {
                Post::create([
                    'user_id' => $lucas->id,
                    'category_id' => $category->id,
                    'title' => 'Blues',
                    'content' => 'Do cillum ea aliquip labore labore veniam anim veniam in anim cupidatat cupidatat aute.',
                    'poster' => 'blues.jpg',
                    'habilitated' => true
                ]);
                Post::create([
                    'user_id' => $pablo->id,
                    'category_id' => $category->id,
                    'title' => 'Reggae',
                    'content' => 'Dolor adipisicing pariatur ipsum eiusmod eu nisi aute.',
                    'poster' => 'reggae.jpg',
                    'habilitated' => true
                ]);
            }
        }
    }
}
