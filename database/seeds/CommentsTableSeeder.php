<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1=new Comment();
        $p2=new Comment();
        $p3=new Comment();
        $p4=new Comment();
        $p5=new Comment();


        $p1->comment="comment1Post1";
        $p1->post_id=1;
        $p1->save();


        $p2->post_id=1;
        $p2->comment="comment2Post1";
        $p2->save();

        $p3->post_id=2;
        $p3->comment="comment1Post2";
        $p3->save();

        $p4->post_id=2;
        $p4->comment="comment2Post2";
        $p4->save();

        $p5->post_id=3;
        $p5->comment="comment1Post3";
        $p5->save();




    }
}
