<?php

namespace Database\Seeders;

use App\Models\VehicleList;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // VehicleList::create ([
        //     'brand_id' => ,
        //     'name' => '',
        //     'slug' => '',
        //     'type' => '',
        //     'color' => '',
        //     'cc' => 
        // ]);

        VehicleList::create ([
            'brand_id' => 1,
            'name' => 'Honda Forza 250',
            'slug' => 'honda-forza-250',
            'type' => \App\Enums\VehicleType::Motor,
            'color' => 'Black Metallic',
            'cc' => 250
        ]);
        
        VehicleList::create ([
            'brand_id' => 2,
            'name' => 'Yamaha XMAX 250',
            'slug' => 'yamaha-xmax-250',
            'type' => \App\Enums\VehicleType::Motor,
            'color' => 'Dark Petrol',
            'cc' => 250
        ]);

        VehicleList::create ([
            'brand_id' => 1,
            'name' => 'Honda Civic Type R 6 M/T',
            'slug' => 'honda-civic-type-r-6-m-t',
            'type' => \App\Enums\VehicleType::Mobil,
            'color' => 'Rallye Red',
            'cc' => 1996
        ]);
    }
}
