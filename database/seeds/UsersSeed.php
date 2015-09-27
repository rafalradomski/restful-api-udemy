<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker; // Maker model
use App\User; // User model

class UsersSeed extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User::create([
            'email' => 'fake@fake.com',
            'password' => Hash::make('pass')
        ]);
    }
}
