@extends('layouts.layout')
@section('title', 'Tous les tests')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Listes des tests</h5>
                        <a href="{{ route('test.create') }}" class="btn btn-primary">Créer un test</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $key => $test)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $test->title }}</td>
                                        <td>{{ $test->description }}</td>
                                        <td>{{ $test->created_at->diffForHumans() }}</td>
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
