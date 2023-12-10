<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BrandListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('brands.index', [
            "title" => "All Brand List",
            "tags" => "All &raquo; <b>Brand List</b>",
            "brands" => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create',[
            'title' => 'Create New Brand'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands',
            'country' => 'required'
        ]);
        
        Brand::create($credentials);

        return to_route('brands.index')->with('success', 'New Brand Has Beend Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',[
            'title' => 'Edit Data Brand',
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required|max:255',
            'country' => 'required'
        ];

        if($request->slug != $brand->slug) {
            $rules['slug'] = ['required', 'unique:brands'];
        }

        $credentials = $request->validate($rules);

        Brand::where('id', $brand->id)->update($credentials);

        return to_route('brands.index')->with('success', 'Brand Has Beend Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);

        return to_route('brands.index')->with('delete', 'Brand Has Beend Deleted!');
    }

    public function checkSlugBrand(Request $request) {
        $slug = SlugService::createSlug(Brand::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
