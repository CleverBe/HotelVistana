<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'ADMIN',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'EMPLEADO',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'HUESPED',
            'guard_name' => 'web'
        ]);
    }
}
