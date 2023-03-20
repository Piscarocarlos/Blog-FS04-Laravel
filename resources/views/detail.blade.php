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
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Laisser un commentaire</h5>
                        <form action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group mb-3">
                                <textarea name="content" placeholder="Votre commentaire ici..." class="form-control" rows="4"
                                    style="resize: none"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark">Commenter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex g-3">
                            <div class="col-md-3">
                                <div class="d-flex gap-2">
                                    <div class="img-box">
                                        <img src="https://via.placeholder.com/50" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <div class="fw-bold">Toto</div>
                                        <small>il y a 2 min</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur sint quasi repellendus
                                    dolore nostrum. Perspiciatis obcaecati labore dicta rerum delectus quaerat aperiam
                                    doloremque voluptatibus totam, quasi, fugiat et praesentium modi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
   
@endsection
