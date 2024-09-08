<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('username', 'admin')->delete();
        
        User::create([
            'username' => 'admin',
            'password' => bcrypt('215314211'),
        ]);
    }
}
