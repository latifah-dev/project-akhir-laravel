<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::query()->create([
            "firstname"=>"latifah",
            "lastname"=>"aja",
            "email"=>"admin@gmail.com",
            "password"=>"admin",
            "email_verified_at" => now(),
            "roleid" => 1,
            "remember_token" => str::random(10)
        ]);
        Role::query()->create([
            "name" => "pemilik"
        ]);
        Role::query()->create([
            "name" => "karyawan"
        ]);
        Role::query()->create([
            "name" => "pembeli"
        ]);
    }
}
