<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker; // Maker model
use App\User; // User model

class DatabaseSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Maker::truncate(); // clear Everytime new Faker data
        User::truncate(); // clear  Everytime new Faker data
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call('MakerSeed'); 
        $this->call('VehiclesSeed'); 
        $this->call('UsersSeed');

        Model::reguard();
    }
}
