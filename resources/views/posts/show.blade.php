@extends('layout')
@section('content')
  <h1 class="title">{{$post->title}}</h1>

  <p>
    {{$post->description}}
  </p>
  
  <p style="margin-bottom:1em;">
    <a href="/posts/{{$post->id}}/edit">Edit</a>
  </p>

  @if ($post->comments->count())
    <div>
        @foreach ($post->comments as $comment)
          <div class="box" style="margin-bottom:1em;">
            <p>{{ $comment->body}}</p>

            <form method="POST" action="/comments/{{$comment->id}}">
              @method('PATCH')
              @csrf

              <button style="display:inline;" class="button" type="submit" name="button">Upvote</button>
              <p style="display:inline;">{{ $comment->upvotes}}</p>
            </form>
          </div>
        @endforeach
    </div>
  @endif

  {{-- add new comment form --}}

  <form method="POST" action="/posts/{{$post->id}}/comments">
    @csrf

    <div class="field">
      <label class="label" for="body">New Comment</label>

      <div class="control">
        <input type="text" name="body" class="input" placeholder="New Comment..." required>
      </div>

    </div>

    <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Add Comment</button>
        </div>
      </div>

      @include('errors')
  </form>
@endsection
