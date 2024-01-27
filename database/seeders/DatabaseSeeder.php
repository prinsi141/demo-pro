<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\Role::create(['name' => 'Admin']);
        \App\Models\Role::create(['name' => 'User']);
        \App\Models\Role::create(['name' => 'Project Manager']);
        \App\Models\Role::create(['name' => 'Hr']);
        \App\Models\Role::create(['name' => 'Accountant']);

        \App\Models\state::create(['name' => 'Delhi']);
        \App\Models\state::create(['name' => 'Goa']);
        \App\Models\state::create(['name' => 'Gujarat']);

        \App\Models\City::create(['state_id' => '1','name' => 'Delhi']);
        \App\Models\City::create(['state_id' => '1','name' => 'New Delhi']);
        \App\Models\City::create(['state_id' => '2','name' => 'Madgaon']);
        \App\Models\City::create(['state_id' => '2','name' => 'Panaji']);
        \App\Models\City::create(['state_id' => '3','name' => 'Ahmadabad']);
        \App\Models\City::create(['state_id' => '3','name' => 'Amreli']);
        \App\Models\City::create(['state_id' => '3','name' => 'Bharuch']);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
            'city_id' => 1,
            'postcode' => 369006,
            'gender' => 1,
            'hobbies' => 'reading, drawing',
            'remember_token' => Str::random(10),
        ]);

        \App\Models\RoleUser::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
