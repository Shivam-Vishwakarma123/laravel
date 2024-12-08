<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function handleAction(Request $request, $action, $id = null)
    {
        switch ($action) {
            case 'add':
            case 'edit':
                $post = $id ? Post::findOrFail($id) : new Post();
                return $this->showForm($post); // Show form for creating or editing a post
    
            case 'store':
            case 'update':
                return $this->savePost($request, $id); // Handle saving or updating
    
            case 'delete':
                $post = Post::findOrFail($id);
                $post->delete();
                return redirect()->route('posts.action', ['action' => 'view'])
                    ->with('success', 'Post deleted successfully.');
    
            case 'view':
            default:
                $posts = Post::paginate(5); // List all posts
                return view('posts.index', compact('posts'));
        }
    }

    private function showForm(Post $post)
{
    return view('posts.form', compact('post')); // Show form for add/edit
}


private function savePost(Request $request, $id = null)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $data = $request->only(['title', 'content']);

    if ($id) {
        // Update the existing post
        $post = Post::findOrFail($id);
        $post->update($data);
        $message = 'Post updated successfully.';
    } else {
        // Create a new post
        Post::create($data);
        $message = 'Post created successfully.';
    }

    return redirect()->route('posts.action', ['action' => 'view'])
        ->with('success', $message);
}

}