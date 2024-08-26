<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = Post::all();
        //return view('posts.index', compact('posts'));
        $posts = Post::with('author')->get(); // Eager load 'author' relationship
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post with the validated data
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->author_id = Auth::id(); // Set the logged-in user as the author
        $post->save();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$post = Post::findOrFail($id);
        //return view('posts.show', compact('post'));
        $post = Post::with('author')->findOrFail($id); // Eager load 'author' relationship
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Ensure the user is authorized to edit the post
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Find the post and update it with the validated data
        $post = Post::findOrFail($id);

        // Ensure the user is authorized to update the post
        $this->authorize('update', $post);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        // Redirect to the post page with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Ensure the user is authorized to delete the post
        $this->authorize('delete', $post);

        $post->delete();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
