<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p2=new Course();
        $p3=new Course();

        $p2->Course_Name="course2";
        $p2->Course_Description="secondcourse";
        $p2->Start_Date="2010-06-23";
        $p2->Course_Duration="two";
        $p2->save();

        $p3->Course_Name="course3";
        $p3->Course_Description="thirdcourse";
        $p3->Start_Date="2010-06-24";
        $p3->Course_Duration="two";
        $p3->save();
    }
}
