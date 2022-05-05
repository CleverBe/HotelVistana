<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Clever',
            'email' => 'cleverbernal123@gmail.com',
            'password' => '12345678'
        ]);
        User::create([
            'name' => 'Jose',
            'phone' => '78978978',
            'email' => 'jose@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('123456789')
        ]);
    }
}
