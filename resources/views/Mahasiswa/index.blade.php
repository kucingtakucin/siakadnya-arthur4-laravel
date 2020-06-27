@extends('layouts.app')
@section('title', 'Mahasiswa Page')
@section('content')
    <section id="mahasiswa_index" class="flex-center full-height">
        <div class="content container mt-5">
            <div class="title m-0 font-weight-bold">Daftar Mahasiswa</div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->jurusan }}</td>
                        <td>{{ $student->angkatan }}</td>
                        <td>
                            <a href="" class="badge badge-info">Detail</a>
                            <a href="" class="badge badge-warning">Update</a>
                            <a href="" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
