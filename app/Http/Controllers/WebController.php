<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendContact(Request $request)
    {
        // validate

        Mail::to('admin@example.com')->send(new ContactMail(
            $request->name,
            $request->email,
            $request->content
        ));

        return back();
    }
}
