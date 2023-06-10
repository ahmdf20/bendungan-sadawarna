@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md col-lg-6 col-sm">
                <div class="card shadow-lg p-2 border-0">
                    <div class="card-body">
                        <h3 class="my-3 text-center">{{ $user->name }}</h3>
                        <div class="d-grid justify-content-center" style="width: 100%; height: 15rem;">
                            <img src="{{ asset('storage/' . $user->photo) }}"
                                style="width:12rem;height: 12rem; border-radius: 100%; object-fit: cover; border:1px solid black"
                                alt="Photo {{ $user->name }}">
                        </div>
                        <div class="d-grid gap-3 text-break mb-3">
                            <h4 class="text-center">{{ $user->email }}</h4>
                            <h4 class="text-center">{{ $user->phone }}</h4>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.edit') }}" class="btn btn-lg btn-warning">Edit</a>
                            <a href="" class="btn btn-lg btn-warning">Ubah Password</a>
                            <a href="{{ route('admin') }}" class="btn btn-lg btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
