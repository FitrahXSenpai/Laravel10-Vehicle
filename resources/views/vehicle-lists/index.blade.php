@extends('layouts.main')

@section('contents')
    <div class="row mb-3 mb-xl-3">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h2 class="float-start mb-0">{!! $tags !!}</h2>
                    </div>
                    <div class="p-2">
                        <form action="" method="get">
                            @if (request('brand'))
                                <input type="hidden" name="brand" value="{{ request('brand') }}">
                            @endif
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" autocomplete="off" autofocus>
                                <button type="submit" class="btn btn-dark">Search</button>
                            </div>
                        </form>
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
            <a href="{{ route('vehicle-lists.create') }}" class="btn btn-dark block-btn mb-3"><i class="bi bi-file-earmark-plus-fill"></i> Create New Data</a>
            <div class="table-responsive">
                <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">No</th>
                            <th scope="col" style="text-align: center;">Vehicle Name</th>
                            <th scope="col" style="text-align: center;">Type</th>
                            <th scope="col" style="text-align: center;">Brand</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td scope="row" style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $post->name }}</td>
                            <td style="text-align: center;">{{ $post->type }}</td>
                            <td style="text-align: center;"><a class="stexts" href="/vehicle-lists?brand={{ $post->brand->slug }}">{{ $post->brand->name }}</a></td>
                            <td style="text-align: center;">
                                <a href="/vehicle/{{ $post->slug }}" class="text-info"><i class="bi bi-eye-fill"></i></a>
                                <a href="/vehicle-lists/{{ $post->slug }}/edit" class="text-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/vehicle-lists/{{ $post->slug }}" method="post" class="d-inline">
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
    <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <p><a class="btn btn-dark" href="/">&laquo; Back To Vehicle Lists</a></p>
                    </div>
                    <div class="p-2">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection