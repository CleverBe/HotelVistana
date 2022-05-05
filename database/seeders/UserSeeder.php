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
            'phone' => '77889977',
            'email' => 'cleverbernal123@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Jose',
            'phone' => '78978978',
            'email' => 'jose@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Pedro',
            'phone' => '78915465',
            'email' => 'pedro@gmail.com',
            'profile' => 'EMPLEADO',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'Andres',
            'phone' => '77445511',
            'email' => 'andres@gmail.com',
            'profile' => 'HUESPED',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
    }
}
