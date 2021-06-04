<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fazail Alam',
            'email' => 'fazailalam898@gmail.com',
            'password' => Hash::make(12345678),
            'created_at' => now()
        ]);
    }
}
