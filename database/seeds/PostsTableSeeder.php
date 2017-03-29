<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestDummy::times(50)->create('App\Post');
    }
}
