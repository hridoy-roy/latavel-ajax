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
            'email_verified_at' => now(),
            'password' => Hash::make('admin2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@mail.com',
            'is_admin' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('user2022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('invoices')->insert([
            'user_id' => 2,
            'invoice_id' => 1,
            'name' => 'Test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
