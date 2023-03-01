@extends('layouts.layout')
@section('title', 'Ajouter un nouveau test')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('test.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="nom"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="4">{{ old('description') }}</textarea>
                                @error('description')
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
