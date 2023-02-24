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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
