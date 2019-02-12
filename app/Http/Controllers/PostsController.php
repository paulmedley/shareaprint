<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::all();
      return view('posts.index', compact('posts'));
    }

    public function create()
    {
      return view('posts.create');
    }

    public function show(Post $post)
    {

      return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
      return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {

      $post->update(request(['title', 'description']));

      return redirect('/posts');
    }

    public function destroy(Post $post)
    {
      $post->delete();

      return redirect('/posts');
    }

    public function store()
    {
      $validated = request()->validate([
        'title' => ['required','min:3'],
        'description' =>['required','min:3']
      ]);

      Post::create($validated);

      return redirect('/posts');
    }
}
