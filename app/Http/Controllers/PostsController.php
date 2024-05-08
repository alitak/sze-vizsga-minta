<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
//        dd(auth()->user());
//        $validated = $request->validated();
//        $validated['user_id'] = auth()->id();

        Post::query()->create($request->validated());

        return redirect('/')->with('status', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->paginate();

        return view('posts.show', [
            'post'     => $post,
            'comments' => $comments,
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect('/')->with('status', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('status', 'Post deleted successfully!');
    }
}
