@extends('layouts.layout')
@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="post">
                    <div class="img-box my-2">
                        <img src="{{ asset($post->image) }}" alt="" class="w-100">
                    </div>
                    <h2>{{ $post->title }}</h2>
                    <h6 class="text-end text-muted">{{ $post->created_at->diffForHumans() }}</h6>
                    <div class="card my-5">
                        <div class="card-body">
                            <p class="fst-italic">
                                {{ $post->description }}
                            </p>
                        </div>
                    </div>

                    <p>
                        {{ $post->content }}
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <aside>
                    <h5>Toutes nos catégories</h5>
                    <ul class="list-group">
                        @foreach (\App\Models\Category::all() as $category)
                            <li class="list-group-item">
                                {{ $category->name }}
                                <span class="badge bg-primary text-end">{{ count($category->posts) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
    </div>
@endsection
