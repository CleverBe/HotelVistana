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
            'password' => bcrypt('123')
        ]);
    }
}
