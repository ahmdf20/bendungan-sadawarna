@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6 my-5">
                <div class="card align-self-center my-5">
                    <div class="card-body">
                        @if (Session::get('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h4 class="text-center fst-italic">Form Login</h4>
                        <form action="{{ route('credentials') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-md btn-success" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
