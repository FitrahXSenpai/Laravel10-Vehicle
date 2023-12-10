@extends('layouts.main')

@section('contents')
    <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="px-3 py-3">
                        <h1 class="text-center">{{ $post->name }}</h1><hr>
                        <article class="mb-2">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->brand->name }}" height="600px">
                            @else
                                <img src="../img/sans.png" class="card-img-top" alt="{{ $post->brand->name }}" height="600px">
                            @endif
                            <div class="table-responsive mt-2">
                                <table class="table">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>: {{ $post->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>: {{ $post->type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>: {{ $post->color }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cubicle Centimeter</td>
                                            <td>: {{ $post->cc }} CC</td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td>: <a class="texts" href="/?brand={{ $post->brand->slug }}">{{ $post->brand->name }}</a> In {{ $post->brand->country }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </article>
                        <div class="d-flex justify-content-around">
                            <div class="p-2">
                                <p><a class="btn btn-dark" href="/">&laquo; Back To Vehicle Lists</a></p>
                            </div>
                            <div class="p-3">
                                <p>Posting {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection