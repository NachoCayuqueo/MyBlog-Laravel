<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Emanuel";
        $user->email = "emanuel@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = "Lucas";
        $user->email = "lucas@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = "Pablo";
        $user->email = "pablo@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
