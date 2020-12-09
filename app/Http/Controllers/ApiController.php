<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;



class ApiController extends Controller
{
    /*Display All the list of StudentsEnrolled*/
    public function getAllStudentsEnrolledData(Student $student)
    {
        $result = $student->All();

        return response()->json($result);
    }

    public function getStudentDataById(Student $student, int $id)
    {
        if ($student->where('id', $id)->exists()) {
            $result = $student->find($id);
            return response()->json($result);
        } else {
            return response()->json([
                "message" => "id not found"
            ], 404);

        }

    }

    /*For each course display a list of entire studentsInfo enrolled in a course*/
    public function retrieveStudentsListByCourseId(int $id, Course $course)
    {
        if ($course->where('id', $id)->exists()) {
            $course = $course->find($id);

            $students = $course->students;

            return response()->json($students);
        } else {
            return response()->json([
                "message" => "id not found"
            ], 404);

        }

    }

    /*display entire students information for a specific course*/
    public function retrieveStudentCourseInfoTableInfoByCourseId(int $id, Course $course)
    {
        if ($course->where('id', $id)->exists()) {
            $course = $course->find($id);

            $students = $course->students->pluck('course_id');

            return response()->json($students);
        } else {
            return response()->json([
                "message" => "id not found"
            ], 404);

        }

    }

    /*Display All the list of courses*/
    public function getAllCoursesTableData(Course $course)
    {

        $result = $course->All();

        return response()->json($result);

    }

    /*Create a Course records*/

    public function createCourseForStudents()
    {
        $course = new Course();
        $course->Course_Name = "NewCourseLatest8";
        $course->Course_Description = "NewCourseDescription";
        $course->Start_Date = "2010-06-23";
        $course->Course_Duration = "two";
        $course->save();
        return response()->json([
            "message" => "course record created"
        ], 201);


    }

    /*Update or Modify Courses*/
    public function updateCourseRecord(string $id, Course $course)
    {
        if ($course->where('id', $id)->exists()) {
            $course = $course->find($id);
            $course->Course_Description = "Updated Course Description now";

            $course->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);

        }

    }

    /*Update or Modify Student(updating course for the student)*/
    public function updateStudentRecord(string $id, Student $student)
    {
        if ($student->where('id', $id)->exists()) {
            $student = $student->find($id);
            $student->course_id = 2;

            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);

        }

    }

    /*add student to a course*/
    public function addStudentToCourse(string $id, Course $course)
    {

        $course = $course->findOrFail($id);
        $student1 = new Student();
        $student1->First_Name="AddedStudent";
        $student1->Last_Name="AddedStudent";
        $student1->Currently_Enrolled="yes";
        $student1->Matriculation_date="2010-06-25";
        $student1->course_id = 2;
        //$student2->course_id = 2;
        $course = $course->students()->save($student1);
       // $course = $course->students()->saveMany([$student1, $student2]);
       $course->save();
       // $comment->save();

        return response()->json("Added students to course");

    }
}
