<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.fr',
            'password' =>Hash::make('0000')
        ]);

        // Création d'autres utilisateurs avec les factories
        User::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Property::factory(100)->create();
        \App\Models\Option::factory(10)->create();
    }
}
