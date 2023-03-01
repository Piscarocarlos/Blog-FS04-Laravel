@extends('layouts.layout')
@section('title', 'Tous les posts')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Listes des posts</h5>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un post</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($post->image) }}" alt="" width="70">
                                        </td>
                                        <td>{{ \Str::limit($post->title, 20) }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ \Str::limit($post->description, 40) }}</td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
