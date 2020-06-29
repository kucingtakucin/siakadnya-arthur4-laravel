@extends('layouts.app')
@section('title', 'Welcome Page')
@section('content')
    <section id="welcome" class="flex-center full-height">
        <div class="content container">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="title m-0 font-weight-bold">Arthur</div>
            <h5>Hai namaku {{$nama}}, biasa dipanggil {{$panggil}}</h5>
        </div>
    </section>
@endsection
