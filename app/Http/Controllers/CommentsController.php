<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;


class CommentsController extends Controller
{
  public function store(Post $post)
  {

    $post->addComment(request('body'));

  	// Comment::create([

   //    'body' => request('body'),
   //    'post_id' => $post->id

  	// ]);
  	return back();
  }
}
