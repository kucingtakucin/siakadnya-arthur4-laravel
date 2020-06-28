@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <section id="home" class="flex-center full-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
