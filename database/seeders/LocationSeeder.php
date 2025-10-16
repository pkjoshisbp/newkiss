<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Twinsburg',
                'email' => 'kiss.swim.twin@gmail.com',
                'phone' => '(216) 469-6400',
                'address' => 'Twinsburg Location',
                'city' => 'Twinsburg',
                'state' => 'OH',
                'zip' => '44087',
                'is_active' => true,
                'sort_order' => 1,
                'notes' => 'Primary contact: kiss.swim.twin@gmail.com or kiss.swim@gmail.com'
            ],
            [
                'name' => 'Brooklyn',
                'email' => 'kissswimna@gmail.com',
                'phone' => '(216) 469-6400',
                'address' => 'Brooklyn Location',
                'city' => 'Brooklyn',
                'state' => 'OH',
                'zip' => '44144',
                'is_active' => true,
                'sort_order' => 2,
                'notes' => null
            ],
            [
                'name' => 'Independence',
                'email' => 'kissswimna@gmail.com',
                'phone' => '(216) 469-6400',
                'address' => 'Independence Location',
                'city' => 'Independence',
                'state' => 'OH',
                'zip' => '44131',
                'is_active' => true,
                'sort_order' => 3,
                'notes' => null
            ],
            [
                'name' => 'Mayfield',
                'email' => 'kiss.swim@gmail.com',
                'phone' => '(216) 469-6400',
                'address' => 'Mayfield Location',
                'city' => 'Mayfield',
                'state' => 'OH',
                'zip' => '44124',
                'is_active' => true,
                'sort_order' => 4,
                'notes' => null
            ],
        ];

        foreach ($locations as $location) {
            Location::updateOrCreate(
                ['name' => $location['name']],
                $location
            );
        }
    }
}
