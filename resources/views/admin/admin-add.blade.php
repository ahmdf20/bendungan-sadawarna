@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user') }}" class="btn-close float-end bg-danger p-2"></a>
                        <h4 class="text-center">Tambah Data Admin</h4>
                        <form action="{{ route('user.create') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Nama <small class="text-danger">*</small></label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email <small class="text-danger">*</small></label>
                                <input type="email" name="email" class="form-control" placeholder="example@example.com"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">No Handphone <small class="text-danger">*</small></label>
                                <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxx"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password <small class="text-danger">*</small></label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
