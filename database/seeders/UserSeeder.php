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
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'is_admin' => true,
            'password' => Hash::make('admin2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@mail.com',
            'is_admin' => false,
            'password' => Hash::make('user2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
