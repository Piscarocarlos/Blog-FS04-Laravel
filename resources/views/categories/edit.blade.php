@extends('layouts.layout')
@section('title', 'Modifier une catégorie')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('category_update', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nom">Nom de la catégorie</label>
                                <input type="text" name="category_name" id="nom" class="form-control"
                                    value="{{ $category->name }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-dark w-100">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
