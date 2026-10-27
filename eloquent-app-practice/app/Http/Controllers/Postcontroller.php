<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->get();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
        ]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        Post::findOrFail($id)->delete();
        return redirect('/posts');
    }
}
