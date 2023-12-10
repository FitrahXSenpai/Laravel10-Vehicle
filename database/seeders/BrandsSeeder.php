<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Brand::create([
        //     'name' => '',
        //     'slug' => '',
        //     'country' => ''
        // ]);

        Brand::create([
            'name' => 'Honda',
            'slug' => 'honda',
            'country' => 'Jepang'
        ]);

        Brand::create([
            'name' => 'Yamaha',
            'slug' => 'yamaha',
            'country' => 'Jepang'
        ]);
    }
}
