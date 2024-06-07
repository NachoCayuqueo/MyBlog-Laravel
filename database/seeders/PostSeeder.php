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

        foreach ([$emanuel, $lucas, $pablo] as $user) {
            foreach ($categories as $category) {
                Post::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => 'Primer post de ' . $user->name . ' en ' . $category->name,
                    'slug' => 'primer-post-de-' . strtolower($user->name) . '-en-' . strtolower($category->slug),
                    'content' => 'Este es el primer post de ' . $user->name . ' en la categoría ' . $category->name . '.',
                    'poster' => 'imagen_proceso.jpg',
                    'habilitated' => true
                ]);
                Post::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => 'Segundo post de ' . $user->name . ' en ' . $category->name,
                    'slug' => 'segundo-post-de-' . strtolower($user->name) . '-en-' . strtolower($category->slug),
                    'content' => 'Este es el segundo post de ' . $user->name . ' en la categoría ' . $category->name . '.',
                    'poster' => 'imagen_proceso.jpg',
                    'habilitated' => true
                ]);
            }
        }
    }
}
