@extends('layouts.main')

@section('contents')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-sm-block">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-start">
                    <h2 class="float-start mb-0">Vahicle &raquo; <b>ALL Brands</b></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        @foreach ($brands as $brand)
            <div class="col-lg-4 col-md-2">
                <a class="texts" href="/?brand={{ $brand->slug }}">
                    <div class="card bg-dark text-white mt-4">
                        <img src="../img/sans.png" class="img-fluid card-img-top" alt="{{ $brand->name }}" height="250px">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-3 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $brand->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-start">
                    <div class="p-2">
                        <p><a class="btn btn-dark" href="/">&laquo; Back To Vehicle Lists</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection