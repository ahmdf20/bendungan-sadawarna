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
            <div class="col-md-6 col-lg-8 col-sm-4">
                <div class="d-flex gap-2 justify-content-center" style="flex-wrap: wrap">
                    <div class="card shadow p-3">
                        <div class="card-body">
                            <h4 class="fst-italic">Jumlah Pengunjung</h4>
                            <h3 class="text-center">{{ count($visitors) }}</h3>
                        </div>
                    </div>
                    <div class="card shadow p-3">
                        <div class="card-body">
                            <h4 class="fst-italic">Jumlah Artikel</h4>
                            <h3 class="text-center">{{ count($posts) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
        </div>
    </div>
@endsection
