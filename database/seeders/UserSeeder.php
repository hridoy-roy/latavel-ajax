<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'is_admin' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('admin2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@mail.com',
            'is_admin' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('demo2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'womenindigital',
            'email' => 'womenindigital@gmail.com',
            'is_admin' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('womenindigital'),
            'plan' => 'premium',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
