@extends('layouts.layout')
@section('title', 'Contact')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Contactez-nous, on vous répond dans les 24h qui suivent</h5>
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="message">Message:</label>
                                <textarea name="content" id="message" rows="7" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark w-100">Envoyer le message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
