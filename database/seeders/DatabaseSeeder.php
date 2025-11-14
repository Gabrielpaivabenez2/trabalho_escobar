<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Vehicle;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('senha123'),
        ]);

        // Brands & models
        $b1 = Brand::create(['name' => 'Toyota']);
        $b2 = Brand::create(['name' => 'Volkswagen']);

        $m1 = CarModel::create(['brand_id' => $b1->id, 'name' => 'Corolla']);
        $m2 = CarModel::create(['brand_id' => $b2->id, 'name' => 'Golf']);

        // Colors
        $c1 = Color::create(['name' => 'Prata', 'hex' => '#C0C0C0']);
        $c2 = Color::create(['name' => 'Preto', 'hex' => '#000000']);

        // Vehicles (com >=3 fotos)
        Vehicle::create([
            'brand_id' => $b1->id,
            'car_model_id' => $m1->id,
            'color_id' => $c1->id,
            'year' => 2019,
            'mileage' => 45000,
            'price' => 85000.00,
            'description' => 'Toyota Corolla em ótimo estado, única dona, manual e revisões em dia.',
            'photos' => [
                'https://images.pexels.com/photos/19581626/pexels-photo-19581626.jpeg',
                'https://media.toyota.com.br/0cefa317-95a5-4046-a9b3-3a77dcd2b9b6.jpeg',
                ''
            ]
        ]);

        Vehicle::create([
            'brand_id' => $b2->id,
            'car_model_id' => $m2->id,
            'color_id' => $c2->id,
            'year' => 2018,
            'mileage' => 68000,
            'price' => 72000.00,
            'description' => 'Volkswagen Golf com pacotes completos.',
            'photos' => [
                'https://images.pexels.com/photos/19165516/pexels-photo-19165516.jpeg'
                
            ]
        ]);
    }
}
