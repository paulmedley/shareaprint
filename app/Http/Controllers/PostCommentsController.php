<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class PostCommentsController extends Controller
{
  public function store(Post $post)
  {
    $attributes = request()->validate(['body' => 'required|min:3']);
    $post->addComment(request('body'));
    return back();
  }

  public function update(Comment $comment)
  {
    $comment->update([
      'upvotes' => ($comment->upvotes + 1)
    ]);

    return back();
  }
}
