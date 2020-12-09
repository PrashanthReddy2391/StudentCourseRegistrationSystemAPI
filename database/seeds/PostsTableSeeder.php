<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1=new Post;
        $p2=new Post;
        $p3=new Post;

        $p1->name="post1";
        $p1->save();
        $p2->name="post2";
        $p2->save();
        $p3->name="post3";
        $p3->save();
    }
}
