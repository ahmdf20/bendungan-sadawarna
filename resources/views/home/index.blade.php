@extends('layouts.home')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center mb-3">
                @if (Session::get('message'))
                    <div class="alert alert-{{ Session::get('color') ? Session::get('color') : 'success' }} alert-dismissible fade show"
                        role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-10">
                    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @for ($i = 1; $i <= 8; $i++)
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $i - 1 }}" class="{{ $i == 1 ? 'active' : '' }}"></button>
                            @endfor
                        </div>
                        <div class="carousel-inner">
                            @for ($i = 1; $i <= 8; $i++)
                                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                    <img src="{{ asset("img/bendungan-$i.jpg") }}" class="d-block w-100"
                                        alt="Bendungan {{ $i }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Foto Bendungan {{ $i }}</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, delectus? Lorem
                                            ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Facilis blanditiis alias soluta.</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border border-dark">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @for ($i = 1; $i <= 8; $i++)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset("img/bendungan-$i.jpg") }}" class="img-fluid rounded-start"
                                    alt="Bendungan {{ $i }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Judul artikel</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore,
                                        sit. Vitae illum perspiciatis non amet neque accusamus expedita eos incidunt quasi,
                                        quisquam...</p>
                                    <p><small class="text-body-secondary">Last updated 3 min ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
