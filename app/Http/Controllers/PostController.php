<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('posts.all', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            'description' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'mimes:png,jpg|max:5500'
        ]);

        $post  = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store("images/posts");
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function commentStore(Request $request) {
        $request->validate([
            'content' =>'required|min:2'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->description = $request->content;

        $comment->save();
        flashy()->success("Votre commentaire a été rajouté avec succès");
        return back();
    }
}
