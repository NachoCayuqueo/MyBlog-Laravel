<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'emanuel@gmail.com')->first();

        if ($user) {
            $category = new Category();
            $category->user_id = $user->id;
            $category->name = "Anime";
            $category->poster = "Series_Anime_Decada.jpg";
            $category->save();

            $category = new Category();
            $category->user_id = $user->id;
            $category->name = "Deportes";
            $category->poster = "Deportes.jpg";
            $category->save();

            $category = new Category();
            $category->user_id = $user->id;
            $category->name = "Música";
            $category->poster = "musica-arte.jpg";
            $category->save();
        }
    }
}
