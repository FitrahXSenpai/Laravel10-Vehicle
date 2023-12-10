<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleList;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class VehicleListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = '';
        $tags = '';
        if(request('brand')) {
            $brand = Brand::firstWhere('slug', request('brand'));
            $title = " In Brand " . $brand->name;
            $tags = " Brand &raquo; <b>" . $brand->name . '</b>';
        }

        return view('vehicle-lists.index', [
            "title" => "All Vehicle List" . $title,
            "tags" => "All &raquo; <b>Vehicle List</b>" . $tags,
            "posts" => VehicleList::latest()->filter(request(['search', 'brand']))->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle-lists.create',[
            'title' => 'Create New Data Vehicle',
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:vehicle_lists',
            'type' => ['required', Rule::in(\App\Enums\VehicleType::class)],
            'type' => ['required', new Enum (\App\Enums\VehicleType::class)],
            'color' => 'required',
            'cc' => 'required|integer',
            'brand_id' => 'required',
            'image' => 'image|file|mimes:jpg,png,jpeg|max:5024',
        ]);

        if($request->file('image')) {
            $credentials['image'] = $request->file('image')->store('vehicle-list-images');
        }

        VehicleList::create($credentials);

        return to_route('vehicle-lists.index')->with('success', 'New Data Has Beend Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleList $post)
    {
        return view('vehicle-lists.vehicle', [
            "title" => "Deskripsi Vehicle " . $post->name,
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleList $vehicleList)
    {
        return view('vehicle-lists.edit',[
            'title' => 'Edit Data Vehicle',
            'post' => $vehicleList,
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleList $vehicleList)
    {
        $rules = [
            'name' => 'required|max:255',
            'type' => ['required', Rule::in(\App\Enums\VehicleType::class)],
            'type' => ['required', new Enum (\App\Enums\VehicleType::class)],
            'color' => 'required',
            'cc' => 'required|integer',
            'brand_id' => 'required',
            'image' => 'image|file|mimes:jpg,png,jpeg|max:5024',
        ];

        if($request->slug != $vehicleList->slug) {
            $rules['slug'] = ['required', 'unique:vehicle_lists'];
        }

        $credentials = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $credentials['image'] = $request->file('image')->store('vehicle-list-images');
        }

        VehicleList::where('id', $vehicleList->id)->update($credentials);

        return to_route('vehicle-lists.index')->with('success', 'Data Has Beend Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleList $vehicleList)
    {

        if($vehicleList->image) {
            Storage::delete($vehicleList->image);
        }

        VehicleList::destroy($vehicleList->id);

        return to_route('vehicle-lists.index')->with('delete', 'Data Has Beend Deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(VehicleList::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
