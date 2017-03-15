<?php

use App\Post;
use App\PostCategory;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostCategory::class)
            ->times(10)
            ->create();

        factory(Post::class)
            ->times(20)
            ->create();
    }
}
