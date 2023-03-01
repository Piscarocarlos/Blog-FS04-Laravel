@extends('layouts.layout')
@section('title', 'Accueil')

@section('content')
    <div class="container">
        <div class="row my-5 g-3">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="{{ asset($post->image) }}" alt="">
                        <div class="card-body">
                            <span class="badge bg-success">{{ $post->category->name }}</span>
                            <h6>{{ $post->title }}</h6>
                            <p class="text-muted">
                                {{ $post->description }}
                            </p>

                            <div class="text-center">
                                <a href="{{ route('post.detail', $post->id) }}" class="btn btn-dark w-75">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
@endsection
