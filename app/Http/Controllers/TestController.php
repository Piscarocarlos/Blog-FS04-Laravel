<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::orderBy('title', 'asc')->get();
        return view('tests.all', compact('tests'));
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'description' => 'required|min:5'
        ]);

        $test = new Test();
        $test->title = $req->title;
        $test->description = $req->description;

        $test->save();

        return redirect()->route('test.index');
    }
}
