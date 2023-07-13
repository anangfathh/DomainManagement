<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     UserSeeder::class,
        // ]);

        User::create([
            'name' => 'Nabila Asyura',
            'email' => 'nabils21@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'employee',
            'phone_number' => '081390503758',
        ]);
        User::create([
            'name' => 'Naila Annahdia',
            'email' => 'naila21@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'buyer',
            'phone_number' => '081390503754',
        ]);
        User::create([
            'name' => 'Nasyila Bernald',
            'email' => 'nasyila65@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'employee',
            'phone_number' => '081390503756',
        ]);
        User::create([
            'name' => 'Gandaria Elsairi',
            'email' => 'elsairi76@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'employee',
            'phone_number' => '081390503758',
        ]);
        User::create([
            'name' => 'Nara Dira Fara',
            'email' => 'difa36326@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'employee',
            'phone_number' => '081390503758',
        ]);
    }
}
