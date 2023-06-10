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
                    <form action="" method="get" class="float-end">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control">
                            <button class="input-group-text">Cari</button>
                        </div>
                    </form>
                    <h4 class="mb-3">Tabel Pengunjung</h4>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->age }}</td>
                                    <td>{{ $data->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $visitors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
