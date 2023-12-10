@extends('layouts.main')

@section('contents')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <h3 class="text-center mb-0">EDIT DATA BRAND</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <form action="/brands/{{ $brand->slug }}" method="post" class="mb-5">
                    @method('put')
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-borderless" cellpadding="10" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><label for="name" style="font-size: 20px;">Name</label></th>
                                    <th style="text-align: center;"><label for="slug" style="font-size: 20px;">Slug</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $brand->name) }}" autofocus required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </td>
                                    <td style="text-align: center;"><input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug', $brand->slug) }}" required>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="text-align: center;" colspan="2"><label for="country" style="font-size: 20px;">Country</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;" colspan="2"><input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" value="{{ old('country', $brand->country) }}" required>
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-dark block-btn mt-2">Update Data</button>
                </form>
            </div>
        </div>
    </div>
    <script>

        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/brands/checkSlugBrand?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
    </script>
@endsection