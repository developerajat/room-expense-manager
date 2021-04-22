<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        $roles = [
            [
                'role_id' => 1,
                'room_id' => 1,
                'first_name' => 'Rajat',
                'last_name' => 'Sharma',
                'email' => 'rajat@yopmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'country_code' => '+91',
                'phone_number' => 7888854653,
                'phone_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345678'),
                'active' => 1,
            ],
            [
                'role_id' => 2,
                'room_id' => 1,
                'first_name' => 'Mohit',
                'last_name' => 'Sharma',
                'email' => 'user@yopmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'country_code' => '+91',
                'phone_number' => 9711593540,
                'phone_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345678'),
                'active' => 1,
            ],

        ];

        foreach ($roles as $role) {
            User::create($role);
        }

        Schema::enableForeignKeyConstraints();
    }
}
