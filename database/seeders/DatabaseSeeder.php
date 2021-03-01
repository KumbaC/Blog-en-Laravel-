<?php

namespace Database\Seeders;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Category::Factory(4)->create();
        Tag::Factory(8)->create();
        Post::Factory(100)->create();
        //Image::factory(1)->create();
        $this->call(PostSeeder::class);


    }
}
