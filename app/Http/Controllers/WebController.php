<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('welcome', compact('posts'));
    }

    public function showContactView()
    {
        return view('contact');
    }

    public function detailPost($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            return view('detail', compact('post'));
        } else {
            // post introuvable
        }
    }
}
