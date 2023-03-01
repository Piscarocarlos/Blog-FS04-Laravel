@extends('layouts.layout')
@section('title', 'Toutes les catégories')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Listes de catégories</h5>
                        <a href="{{ route('category_create') }}" class="btn btn-primary">Créer une catégorie</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('category_edit', $category->id) }}"
                                                class="btn btn-success">Modifier</a>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $category->id }}">Supprimer</button>

                                            <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                                Confirmation de suppression
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Voulez-vous supprimer la catégorie <strong>{{ $category->name }}
                                                                ?</strong>
                                                        </div>
                                                        <form action="{{ route('category_delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
