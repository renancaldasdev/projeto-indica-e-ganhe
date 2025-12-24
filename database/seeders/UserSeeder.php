<?php

namespace Database\Seeders;

use App\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Sistema',
            'telephone' => '11999999999',
            'document' => '00000000000',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_super_admin' => true,
            'email_verified_at' => now(),
        ]);

        User::factory(10)->create();
    }
}
