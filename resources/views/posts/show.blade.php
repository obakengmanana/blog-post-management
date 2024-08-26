<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Posted by {{ $post->author->name }} on {{ $post->created_at->format('M d, Y') }}</p>
    <div>
        {{ $post->content }}
    </div>
    <div class="mt-4">
        <a href="{{ route('posts.index') }}" class="btn btn-primary mr-2">Back to Posts</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit Post</a>
    </div>
</div>
@endsection
