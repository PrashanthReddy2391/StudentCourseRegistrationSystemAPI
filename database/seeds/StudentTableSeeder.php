<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1=new Student();
        $p2=new Student();
//        $p3=new Student();
//        $p4=new Student();
//        $p5=new Student();


        $p1->course_id="2";
        $p1->First_Name="student1fname";
        $p1->Last_Name="student1lname";
        $p1->Currently_Enrolled="yes";
        $p1->Matriculation_date="2010-06-24";

        $p1->save();


        $p2->course_id="2";
        $p2->First_Name="student2fname";
        $p2->Last_Name="student2lname";
        $p2->Currently_Enrolled="yes";
        $p2->Matriculation_date="2010-06-25";
        $p2->save();

//        $p3->post_id=2;
//        $p3->comment="comment1Post2";
//        $p3->save();
//
//        $p4->post_id=2;
//        $p4->comment="comment2Post2";
//        $p4->save();
//
//        $p5->post_id=3;
//        $p5->comment="comment1Post3";
//        $p5->save();
    }
}
