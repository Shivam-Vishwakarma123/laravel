@extends('layout')

@section('content')
    <h1>{{ isset($post) ? 'Edit Post' : 'Create New Post' }}</h1>
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" class="mt-4">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
