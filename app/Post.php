<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];

  public function addComment($body)
  {
    return Comment::create([
      'post_id' => $this->id,
      'body' => $body,
      'upvotes' => 0
    ]);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
}
