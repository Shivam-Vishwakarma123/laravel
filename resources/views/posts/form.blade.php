@extends('layout')

@section('content')
    <h1>{{ $post->exists ? 'Edit Post' : 'Create New Post' }}</h1>
    <form action="{{ url('posts/' . ($post->exists ? 'update/' . $post->id : 'store')) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">{{ $post->exists ? 'Update Post' : 'Create Post' }}</button>
        <a href="{{ url('posts/view') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
