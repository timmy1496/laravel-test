<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ImageSeeder::class);
        factory(Post::class, 100)->create();
        factory(Comment::class, 1000)->create();
    }
}
