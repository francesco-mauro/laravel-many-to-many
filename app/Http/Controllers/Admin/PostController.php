<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Type;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.posts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id'
        ]);

        $newPost = new Post();
        $newPost->title = $request->title;
        $newPost->description = $request->description;
        $newPost->slug = Str::slug($request->title);
        $newPost->type_id = $request->type_id;
        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        return view('admin.posts.edit', compact('post', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id'
        ]);
    
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);
        $post->type_id = $request->type_id;
        $post->save();
    
        return redirect()->route('admin.posts.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
