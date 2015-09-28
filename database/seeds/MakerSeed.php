<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker;
use Faker\Factory as Faker; // Faker

class MakerSeed extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Faker
        $faker = Faker::create();

        for( $i =0; $i < 100; $i++) {
            Maker::create([
                'name' => $faker->word(), 
                'phone' => $faker->randomDigit(5)
            ]);

        }

        
    }
}
