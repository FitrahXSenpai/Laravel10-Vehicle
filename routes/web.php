<?php

use App\Models\Brand;
use App\Models\VehicleList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandListController;
use App\Http\Controllers\VehicleListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman Route Vehicle Lists

Route::get('/', function () {
    return view('index', [
        "title" => "All Vehicle List",
        "tags" => "All &raquo; <b>Vehicle List</b>",
        "posts" => VehicleList::latest()->filter(request(['search', 'brand']))->paginate(5)->withQueryString()
    ]);
});

// Halaman Route Brand Lists

Route::get('/brand-lists', function () {
    return view('brands', [
        "title" => "All Brand List",
        "tags" => "All &raquo; <b>Brand List</b>",
        "brands" => Brand::all()
    ]);
});

// Halaman Route Vehicle Lists

Route::controller(VehicleListController::class)->group(function () {
    Route::get('/vehicle-lists/checkSlug', 'checkSlug');
    Route::get('/vehicle/{post:slug}', 'show');
});

Route::resource('/vehicle-lists', VehicleListController::class);

// Halaman Route Brand Lists

Route::get('/brands/checkSlugBrand', [BrandListController::class, 'checkSlugBrand']);
Route::resource('/brands', BrandListController::class)->except('show');