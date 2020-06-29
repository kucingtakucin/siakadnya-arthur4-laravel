@extends('layouts.app')
@section('title', 'Student Page')
@section('content')
    <section id="mahasiswa_index" class="flex-center full-height">
        <div class="content container mt-5 mb-5">
            <div class="title m-0 font-weight-bold">Daftar Mahasiswa</div>
            <a href="{{ route('Student.create') }}" class="btn btn-primary mb-3">{{ __('Insert') }}</a>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
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
                            <button type="button" class="btn badge badge-info student-detail" data-toggle="modal" data-target="#detailModal" data-baseurl="{{ route('Student.show', $student->id) }}">Detail</button>
                            <a href="{{ route('Student.edit', $student->id) }}" class="badge badge-warning">Update</a>
                            <button type="button" class="btn badge badge-danger student-confirm-delete" data-toggle="modal" data-target="#deleteModal" data-baseurl="{{ route('Student.destroy', $student->id) }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="student_detail"></div>
        <form action="" method="post" class="student-delete-form">
            @csrf
            @method('delete')
            <div id="student_confirm_delete"></div>
        </form>
    </section>
@endsection
