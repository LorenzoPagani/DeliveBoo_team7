<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'pizzeria da Gigi',
                'address' => 'via di prova 1',
                'description' => 'descrizione lunga',
                'vat' => '12345968745',
            ],
            [
                'name' => 'pizzeria da Luigi',
                'address' => 'via di prova 2',
                'description' => 'descrizione lunga',
                'vat' => '15962348745',
            ],
            [
                'name' => 'pizzeria da Mario',
                'address' => 'via di prova 3',
                'description' => 'descrizione lunga',
                'vat' => '68712345945',
            ],
            
        ];

        foreach ($restaurants as $restaurant) {
            $newRestaurant =  new Restaurant ();
            $newRestaurant->name = $restaurant["name"];
            $newRestaurant->address = $restaurant["address"];
            $newRestaurant->description = $restaurant["description"];
            $newRestaurant->vat = $restaurant["vat"];
            $newRestaurant->save();
        }
    }
}