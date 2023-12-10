@extends('layouts.main')

@section('contents')
    <div class="row mb-3 mb-xl-3">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h2 class="float-start mb-0">{!! $tags !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            @endif
            @if (session()->has('delete'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            @endif
            <a href="{{ route('brands.create') }}" class="btn btn-dark block-btn mb-3"><i class="bi bi-file-earmark-plus-fill"></i> Create New Data</a>
            <div class="table-responsive">
                <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">No</th>
                            <th scope="col" style="text-align: center;">Brand Name</th>
                            <th scope="col" style="text-align: center;">Country</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td scope="row" style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $brand->name }}</td>
                            <td style="text-align: center;">{{ $brand->country }}</td>
                            <td style="text-align: center;">
                                <a href="/brands/{{ $brand->slug }}/edit" class="text-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/brands/{{ $brand->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="text-danger bg-dark border-0" onclick="return confirm('Are You Sure You Want To Delete This Data?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <p><a class="btn btn-dark" href="/">&laquo; Back To Vehicle Lists</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection