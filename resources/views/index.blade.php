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
            <div class="d-flex justify-content-between">
                <div class="p-2">
                    <a href="{{ route('vehicle-lists.index') }}" class="btn btn-dark block-btn mb-3">CRUD Vehicle</a>
                </div>
                <div class="p-2">
                    <a href="/brand-lists" class="btn btn-dark block-btn mb-3"> Brand List</a>
                </div>
                <div class="p-2">
                    <a href="{{ route('brands.index') }}" class="btn btn-dark block-btn mb-3"> CRUD Brand</a>
                </div>
            </div>
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
                            <td style="text-align: center;"><a class="stexts" href="/?brand={{ $post->brand->slug }}">{{ $post->brand->name }}</a></td>
                            <td style="text-align: center;">
                                <a href="/vehicle/{{ $post->slug }}" class="text-info"><i class="bi bi-eye-fill"></i></a>
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
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection