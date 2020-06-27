@extends('layouts.app')
@section('title', 'Welcome Page')
@section('content')
    <section id="welcome" class="flex-center full-height">
        <div class="content container">
            <div class="title m-0 font-weight-bold">Arthur</div>
            <h5>Hai namaku {{$nama}}, biasa dipanggil {{$panggil}}</h5>
        </div>
    </section>
@endsection
