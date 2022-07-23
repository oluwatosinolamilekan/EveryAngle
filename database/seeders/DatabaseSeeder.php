<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\Category::factory(20)->create();
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');
        $user->save();

        $categories = [
          'Movies',
          'Games',
          'Music'
        ];

        foreach ($categories as $category){
            $saveCategory = new Category();
            $saveCategory->name = $category;
            $saveCategory->save();
        }
    }
}
