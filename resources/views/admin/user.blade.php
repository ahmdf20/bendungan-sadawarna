@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-10">
                <div class="table-responsive">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-success float-end">Tambah Data</a>
                    <h4 class="mb-3">Tabel Akun Admin</h4>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', ['user' => $data->id]) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('user.edit.password', ['user' => $data->id]) }}"
                                            class="btn btn-sm btn-warning">Ubah
                                            Password</a>
                                        <a href="{{ route('user.detail', ['user' => $data->id]) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ route('user.delete', ['user' => $data->id]) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda ingin menghapus admin {{ $data->name }}')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
