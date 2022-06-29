<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        return User::create([
            'name' => 'Mynet Case Study',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
