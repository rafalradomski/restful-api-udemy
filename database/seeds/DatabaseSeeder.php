<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker; // Faker

class DatabaseSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Maker::truncate(); // Everytime new Faker data
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call('MakerSeed'); // Faker
        $this->call('VehiclesSeed'); // Faker

        Model::reguard();
    }
}
