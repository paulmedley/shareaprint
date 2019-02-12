@extends('layout')
@section('content')
  <h1 class="title">Create new post</h1>

  <form method="POST" action="/posts">
    {{ csrf_field() }}
    <div class="field">
      <label class="label" for="title">Post Title</label>

      <div class="control">
        <input class="input {{$errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" placeholder="Project title" value="{{old('title')}}" required>
      </div>
    </div>

    <div class="field">
      <label class="label" for="description">Description</label>
      <div class="control">
        <textarea class="input {{$errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Post desctiption" required>{{old('description')}}</textarea>
      </div>
    </div>

    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Create Post</button>
      </div>
    </div>

    @include('errors')
  </form>
@endsection
