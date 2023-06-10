@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user') }}" class="btn-close float-end bg-danger p-2"></a>
                        <h4 class="text-center">Edit Password {{ $select_user->name }}</h4>
                        <form action="{{ route('user.update.password', ['user' => $select_user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Password <small class="text-danger">*</small></label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Repeat Password <small class="text-danger">*</small></label>
                                <input type="password" name="repeat-password" class="form-control">
                                @error('repeat-password')
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
