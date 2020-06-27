@extends('layouts.app')
@section('title', 'About Page')
@section('content')
    <section id="about" class="flex-center full-height">
        <div class="container">
            <div class="jumbotron p-2 rounded-lg shadow bg-light d-flex flex-column align-items-center justify-content-center">
                <h1 class="title font-weight-bold">About Me</h1>
                <img class="img-thumbnail rounded-circle" width="300" src="{{ asset('img/my-foto.jpg') }}" alt="about me">
                <h3 class="mt-3">Adam Arthur Faizal</h3>
            </div>
        </div>
    </section>
@endsection
