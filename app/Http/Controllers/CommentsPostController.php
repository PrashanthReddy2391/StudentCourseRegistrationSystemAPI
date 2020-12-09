<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;


class CommentsPostController extends Controller
{


    public function createRecords()
    {
        $post = Post::find(1);

        $comment = new Comment;
        $comment->comment = "Hi ItSolutionStuff.com";

//        $post = $post->comments()->save($comment);
//        $post = Post::find(1);
//
//        $comment1 = new Comment;
//        $comment1->comment = "Hi ItSolutionStuff.com Comment 1";
//
//        $comment2 = new Comment;
//        $comment2->comment = "Hi ItSolutionStuff.com Comment 2";
//
//        $post = $post->comments()->saveMany([$comment1, $comment2]);
//
//        $comment = Comment::find(1);
//        $post = Post::find(2);
//
//        $comment->post()->associate($post)->save();
    }

    /*For each course display a list of students enrolled in a course*/
    public function retrieveCommentsByPostId(int $id, Post $post)
    {
        $post = $post->findOrFail($id);

        $comments = $post->comments->pluck('comment');

        return response()->json(array('commentDescription' =>$comments));

    }

    /*display entire students information for a specific course*/
    public function retrieveCommentTableInfoByPostId(int $id, Post $post)
    {

        $post = $post->findOrFail($id);

        $commentsTableData = $post->comments;   //gives the entire table of comments for  specific post id

        return response()->json($commentsTableData);

    }

    /*Display All the list of courses*/
    public function getAllPostTableData(Post $post)
    {
        $result = $post->All();

        return response()->json($result);

    }

    /*Display All the list of StudentsInfo*/
    public function getAllCommentsTableData(Comment $comment)
    {
        $result = $comment->All();

        return response()->json($result);

    }

    /*Display a list of all students enrolled for a course*/
    public function retrieveCommentsTableInfoByCommentId(int $id, Comment $comment)
    {
        $comment = $comment->findOrFail($id);

        return response()->json($comment);

    }

    /*Create a course*/
    public function createPostRecord(Post $post)
    {

        $post->name = "post5";
        $post->save();
        return response()->json("Post created");

    }

    /*Modify a course*/
    public function modifyPostRecord(Post $post, int $id)
    {
        $post = $post->findOrFail($id);
        $post->name = "post4Modified";
        $post->save();
        return response()->json("Post Modified");

    }

    /*Modify a student*/
    public function modifyCommentRecord(Comment $comment, int $id)
    {
        $comment = $comment->findOrFail($id);
        $comment->comment = "comment1Modified";
        $comment->save();
        return response()->json("Comment Modified");
    }

    /*Add a student to a course*/
    public function addCommentsToAPost(Post $post, Comment $comment, string $id)
    {
        $post = $post->findOrFail($id);
        $comment1 = new Comment;
        $comment2 = new Comment;
        $comment1->comment = "AddComment11";
        $comment2->comment = "AddComment12";
        //$post = $post->comments()->save($comment);
        $post = $post->comments()->saveMany([$comment1, $comment2]);
//        $post->save();
//        $comment->save();

        return response()->json($post);
    }
}
