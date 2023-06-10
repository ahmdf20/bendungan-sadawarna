@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user') }}" class="btn-close float-end bg-danger p-2"></a>
                        <h4 class="text-center">Edit Profile Saya</h4>
                        <div class="d-grid justify-content-center" style="width: 100%; height: 15rem;">
                            <img src="{{ asset('storage/' . $user->photo) }}"
                                style="width:12rem;height: 12rem; border-radius: 100%; object-fit: cover; border:1px solid black"
                                alt="Photo {{ $user->name }}" id="admin-photo">
                        </div>
                        <form action="{{ route('admin.update', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control"
                                    placeholder="Nama Lengkap">
                                @error('photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nama <small class="text-danger">*</small></label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email <small class="text-danger">*</small></label>
                                <input type="email" name="email" class="form-control" placeholder="example@example.com"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">No Handphone <small class="text-danger">*</small></label>
                                <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxx"
                                    value="{{ $user->phone }}">
                                @error('phone')
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
    <script>
        const canvasImg = document.getElementById('admin-photo')
        const photo = document.getElementById('photo')
        photo.addEventListener('change', (e) => {
            canvasImg.src = URL.createObjectURL(photo.files[0])
        })
    </script>
@endsection
