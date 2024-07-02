<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DiligenciamientoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        
        // \App\Models\User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin123',
        // ]);

        $this->call([
            RolesPermissionSeeder::class,
        ]);
    }
}
