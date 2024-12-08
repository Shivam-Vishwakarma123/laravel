@extends('layout')

@section('content')
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
