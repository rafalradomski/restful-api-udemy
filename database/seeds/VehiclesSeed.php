<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Vehicle;
use Faker\Factory as Faker; // Faker

class VehiclesSeed extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Faker
        $faker = Faker::create();

        for( $i =0; $i < 30; $i++) {
            Vehicle::create([

                'color' => $faker->safecolorName(), 
                'power' => $faker->randomNumber(),
                'capacity' => $faker->randomFloat(),
                'speed' => $faker->randomFloat(),
                'maker_id' => $faker->numberBetween(1,5)
            ]);            
        }
        
    }
}