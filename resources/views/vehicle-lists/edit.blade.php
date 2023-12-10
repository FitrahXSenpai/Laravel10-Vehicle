@extends('layouts.main')

@section('contents')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <h3 class="text-center mb-0">EDIT DATA VEHICLE</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="px-3 py-3">
                <form action="/vehicle-lists/{{ $post->slug }}" method="post" enctype="multipart/form-data" class="mb-5">
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
                                    <td style="text-align: center;"><input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $post->name) }}" autofocus required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </td>
                                    <td style="text-align: center;"><input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug', $post->slug) }}" required>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><label for="type" style="font-size: 20px;">Type</label></th>
                                    <th style="text-align: center;"><label for="color" style="font-size: 20px;">Color</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <div class="input-group mb-3">
                                            <select class="form-select @error('type') is-invalid @enderror text-center" name="type" id="type">
                                                <option value="" selected disabled>Silahkan Pilih Type</option>
                                                <option value="Mobil" @selected($post->type == 'Mobil')>Mobil</option>
                                                <option value="Motor" @selected($post->type == 'Motor')>Motor</option>
                                            </select>
                                            <label class="input-group-text" for="type">Options</label>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td style="text-align: center;"><input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" placeholder="Color" value="{{ old('color', $post->color) }}" required>
                                        @error('color')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><label for="cc" style="font-size: 20px;">Cubicle Centimeter</label></th>
                                    <th style="text-align: center;"><label for="brand" style="font-size: 20px;">Brand</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><input type="number" name="cc" id="cc" class="form-control @error('cc') is-invalid @enderror" placeholder="Cubicle Centimeter" value="{{ old('cc', $post->cc) }}" required>
                                        @error('cc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="input-group mb-3">
                                            <select class="form-select @error('brand_id') is-invalid @enderror text-center" name="brand_id" id="brand">
                                                <option value="" selected disabled>Silahkan Pilih Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ (old('brand_id', $post->brand_id) == $brand->id ? 'selected' : '') }}>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <label class="input-group-text" for="brand">Options</label>
                                        </div>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="text-align: center;" colspan="2">
                                        <label for="image" style="font-size: 20px;">Upload Image</label>
                                        <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-preview img-fluid d-block rounded mx-auto mt-2 mb-2" width="250">
                                        @else
                                            <img class="img-preview img-fluid d-block rounded mx-auto mt-2 mb-2" width="250">
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;" colspan="2">
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                                    @error('image')
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
            fetch('/vehicle-lists/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
    </script>
@endsection