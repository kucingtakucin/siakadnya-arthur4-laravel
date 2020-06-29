@extends('layouts.app')
@section('title', 'Student Page | Create')
@section('content')
    <section class="flex-center full-height">
        <div class="content container mt-5 mb-5 pb-5">
            <div class="row justify-content-center">
                <div class="title m-0 font-weight-bold">Insert Student</div>
                <div class="col-md-8 border shadow rounded-lg p-5">
                    <form action="{{ route('Student.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control  @error('nim') is-invalid @enderror" id="nim" value="{{ old('nim') }}" autoComplete="off"
                                   name="nim">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}" autoComplete="off"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ old('jurusan') }}" autoComplete="off"
                                   name="jurusan">
                            @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror"  id="angkatan"
                                   value="{{ old('angkatan') }}" autoComplete="off" name="angkatan">
                            @error('angkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('Student.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
